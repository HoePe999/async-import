<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\AsynchronousImportCsvApi;

use Magento\Framework\Webapi\Rest\Request;
use Magento\TestFramework\TestCase\WebapiAbstract;

/**
 * Create csv source test
 */
class CreateCsvSourceTest extends WebapiAbstract
{
    /**#@+
     * Service constants
     */
    const RESOURCE_PATH = '/V1/import/sources/csv';
    const SERVICE_NAME = 'asynchronousImportCsvApiCreateCsvSourceV1';
    /**#@-*/

    public function testCreateCsvSource()
    {
        $serviceInfo = [
            'rest' => [
                'resourcePath' => self::RESOURCE_PATH,
                'httpMethod' => Request::HTTP_METHOD_POST,
            ],
            'soap' => [
                'service' => self::SERVICE_NAME,
                'operation' => self::SERVICE_NAME . 'Execute',
            ],
        ];

        $data = [
            'uuid' => 'c4f2d109-0792-41ff-9f24-788ed5634b41',
            'sourceData' => [
                'sourceType' => 'base64_encoded_data',
                'sourceData' => 'value2',
            ],
            'format' => [
                'escape' => 'CSV',
                'enclosure' => 'CSV',
                'delimiter' => 'CSV',
                'multipleValueSeparator' => 'CSV',
                'extensionAttributes' => null,
            ]
        ];
        $this->_webApiCall($serviceInfo, $data);
    }

    public function testCreateCsvSourceWithPartialFormat()
    {
        $serviceInfo = [
            'rest' => [
                'resourcePath' => self::RESOURCE_PATH,
                'httpMethod' => Request::HTTP_METHOD_POST,
            ],
            'soap' => [
                'service' => self::SERVICE_NAME,
                'operation' => self::SERVICE_NAME . 'Execute',
            ],
        ];

        $data = [
            'uuid' => 'c4f2d109-0792-41ff-9f24-788ed5634b41',
            'sourceData' => [
                'sourceType' => 'base64_encoded_data',
                'sourceData' => 'value2',
            ],
            'format' => [
                'multipleValueSeparator' => 'CSV',
            ]
        ];
        $this->_webApiCall($serviceInfo, $data);
    }

    public function testCreateCsvSourceWithoutFormat()
    {
        $serviceInfo = [
            'rest' => [
                'resourcePath' => self::RESOURCE_PATH,
                'httpMethod' => Request::HTTP_METHOD_POST,
            ],
            'soap' => [
                'service' => self::SERVICE_NAME,
                'operation' => self::SERVICE_NAME . 'Execute',
            ],
        ];

        $data = [
            'uuid' => 'c4f2d109-0792-41ff-9f24-788ed5634b42',
            'sourceData' => [
                'sourceType' => 'base64_encoded_data',
                'sourceData' => 'value2',
            ],
        ];
        $this->_webApiCall($serviceInfo, $data);
    }
}
