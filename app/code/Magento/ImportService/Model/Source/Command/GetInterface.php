<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\ImportService\Model\Source\Command;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\ImportService\Api\Data\SourceCsvInterface;

/**
 * Get source by uuid command
 *
 * Separate command interface to which Repository proxies initial Get call
 *
 * @see \Magento\ImportService\Api\SourceCsvRepositoryInterface
 */
interface GetInterface
{
    /**
     * Get source data by given uuid
     *
     * @param string $uuid
     * @return SourceCsvInterface
     * @throws NoSuchEntityException
     */
    public function execute(string $uuid): SourceCsvInterface;
}
