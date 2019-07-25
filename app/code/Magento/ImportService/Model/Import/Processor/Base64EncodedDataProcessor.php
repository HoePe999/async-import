<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\ImportService\Model\Import\Processor;

use Magento\ImportServiceApi\Api\Data\SourceCsvInterface;
use Magento\ImportServiceApi\Api\Data\SourceUploadResponseInterface;
use Magento\ImportService\Model\Source\Validator\ValidatorInterface;

/**
 * Base64 encoded data processor for asynchronous import
 */
class Base64EncodedDataProcessor implements SourceProcessorInterface
{
    /**
     * Import Type
     */
    const IMPORT_TYPE = 'base64_encoded_data';

    /**
     * @var PersistentSourceProcessor
     */
    private $persistantUploader;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * @param PersistentSourceProcessor $persistantUploader
     * @param ValidatorInterface $validator
     */
    public function __construct(
        PersistentSourceProcessor $persistantUploader,
        ValidatorInterface $validator
    ) {
        $this->persistantUploader = $persistantUploader;
        $this->validator = $validator;
    }

    /**
     *  {@inheritdoc}
     */
    public function processUpload(SourceCsvInterface $source, SourceUploadResponseInterface $response)
    {
        $this->validator->validate($source);

        /** @var string $content */
        $content = base64_decode($source->getImportData());

        /** Set downloaded data */
        $source->setImportData($content);

        /** process source and get response details */
        return $this->persistantUploader->processUpload($source, $response);
    }
}
