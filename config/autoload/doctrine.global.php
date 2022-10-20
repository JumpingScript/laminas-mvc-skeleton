<?php

    return [
        'doctrine' => [
            'driver' => [
                'my_annotation_driver' => [
                    'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
                    'cache' => 'array',
                    'paths' => [
                        // __DIR__ . '/../../module/Application/src/Model/',
                    ],
                ],
                'orm_default' => [
                    'drivers' => [
                        // register `my_annotation_driver` for any entity under namespace `My\Namespace`
                        // 'Application\Model' => 'my_annotation_driver',
                    ],
                ],
            ],
            'migrations_configuration' => [
                'orm_default' => [
                    'table_storage' => [
                        'table_name' => '_version',
                        'version_column_name' => 'version',
                        'version_column_length' => 1024,
                        'executed_at_column_name' => 'executed_at',
                        'execution_time_column_name' => 'execution_time',
                    ],
                    'migrations_paths' => [
                        // 'Application\Migrations' => './module/Application/src/Migrations',
                    ],
                    'all_or_nothing' => true,
                    'transactional' => true,
                    'check_database_platform' => true,
                    'organize_migrations' => 'none',
                    'dependency_factory_services' => [
                        \Doctrine\Migrations\Version\Comparator::class => Application\Service\DoctrineMigrationVersionComparatorWithoutNamespace::class
                    ]
                ]
            ],
            'configuration' => [
                'orm_default' => [
                    'proxy_dir' => 'data/cache/DoctrineORMModule/Proxy',
                ]
            ],
            'connection' => [
                'orm_default' => [
                    'driverClass' => Doctrine\DBAL\Driver\PDO\MySQL\Driver::class,
                    'params' => [
                        'url'    => "mysql://user:password@localhost/dbname"
                    ]
                ]
            ]
        ],
    ];
