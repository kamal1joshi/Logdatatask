<?php
namespace Excellence\Hello\Setup;

/**
 * Class InstallSchema
 */
class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
    /**
     * @inheritDoc
     * @throws \Zend_Db_Exception
     */
    public function install(
        \Magento\Framework\Setup\SchemaSetupInterface $setup,
        \Magento\Framework\Setup\ModuleContextInterface $context
    ) {
        $installer = $setup;
        $installer->startSetup();
        //START: install stuff
        //END:   install stuff

        //START table setup
        $table = $installer->getConnection()->newTable(
            $installer->getTable('excellence_hello_test')
        )->addColumn(
            'excellence_hello_test_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [ 'identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true ],
            'Entity ID'
        )->addColumn(
            'title',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [ 'nullable' => false ],
            'Demo Title'
        )->addColumn(
            'creation_time',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            [ 'nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT ],
            'Creation Time'
        )->addColumn(
            'update_time',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            [ 'nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE ],
            'Modification Time'
        )->addColumn(
            'is_active',
            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
            null,
            [ 'nullable' => false, 'default' => '1' ],
            'Is Active'
        );

        $table1 = $installer->getConnection()->newTable(
            $installer->getTable('logdata')
        )->addColumn(
            'id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [ 'identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true ]
        
        )->addColumn(
            'email',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [ 'nullable' => false ]
        )->addColumn(
            'login',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            [ 'nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT ]
        )->addColumn(
            'logout',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null
        );
        $installer->getConnection()->createTable($table);
        $installer->getConnection()->createTable($table1);
        //END   table setup
        $installer->endSetup();
    }
}
