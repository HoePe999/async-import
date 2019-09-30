<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\AsynchronousImportCsv\Model;

use Magento\AsynchronousImportApi\Api\Data\ImportInterface;
use Magento\AsynchronousImportCsvApi\Api\Data\CsvFormatInterface;
use Magento\AsynchronousImportCsvApi\Api\StartImportInterface;
use Magento\AsynchronousImportCsvApi\Model\SourceDataReaderInterface;
use Magento\AsynchronousImportSourceDataRetrievingApi\Api\Data\SourceInterface;
use Magento\AsynchronousImportSourceDataRetrievingApi\Api\RetrieveSourceDataInterface;

/**
 * @inheritdoc
 */
class StartImport implements StartImportInterface
{
    /**
     * @var RetrieveSourceDataInterface
     */
    private $retrieveSourceData;

    /**
     * @var SourceDataReaderInterface
     */
    private $sourceDataReader;

    /**
     * @param RetrieveSourceDataInterface $retrieveSourceData
     * @param SourceDataReaderInterface $sourceDataReader
     */
    public function __construct(
        RetrieveSourceDataInterface $retrieveSourceData,
        SourceDataReaderInterface $sourceDataReader
    ) {
        $this->retrieveSourceData = $retrieveSourceData;
        $this->sourceDataReader = $sourceDataReader;
    }

    /**
     * @inheritdoc
     */
    public function execute(
        SourceInterface $source,
        ImportInterface $import,
        string $uuid = null,
        CsvFormatInterface $format = null
    ): string {
        $sourceData = $this->retrieveSourceData->execute($source);
        $this->sourceDataReader->execute($sourceData, $format);

        return 'UID';
    }
}
