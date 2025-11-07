<?php return array (
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'reverb' => 
      array (
        'driver' => 'reverb',
        'key' => NULL,
        'secret' => NULL,
        'app_id' => NULL,
        'options' => 
        array (
          'host' => NULL,
          'port' => 443,
          'scheme' => 'https',
          'useTLS' => true,
        ),
        'client_options' => 
        array (
        ),
      ),
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => NULL,
        'secret' => NULL,
        'app_id' => NULL,
        'options' => 
        array (
          'cluster' => NULL,
          'host' => 'api-mt1.pusher.com',
          'port' => 443,
          'scheme' => 'https',
          'encrypted' => true,
          'useTLS' => true,
        ),
        'client_options' => 
        array (
        ),
      ),
      'ably' => 
      array (
        'driver' => 'ably',
        'key' => NULL,
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'concurrency' => 
  array (
    'default' => 'process',
  ),
  'cors' => 
  array (
    'paths' => 
    array (
      0 => 'api/*',
      1 => 'sanctum/csrf-cookie',
    ),
    'allowed_methods' => 
    array (
      0 => '*',
    ),
    'allowed_origins' => 
    array (
      0 => '*',
    ),
    'allowed_origins_patterns' => 
    array (
    ),
    'allowed_headers' => 
    array (
      0 => '*',
    ),
    'exposed_headers' => 
    array (
    ),
    'max_age' => 0,
    'supports_credentials' => false,
  ),
  'hashing' => 
  array (
    'driver' => 'bcrypt',
    'bcrypt' => 
    array (
      'rounds' => '12',
      'verify' => true,
      'limit' => NULL,
    ),
    'argon' => 
    array (
      'memory' => 65536,
      'threads' => 1,
      'time' => 4,
      'verify' => true,
    ),
    'rehash_on_login' => true,
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => 'C:\\dev\\doctor-appointment-app-4b\\resources\\views',
    ),
    'compiled' => 'C:\\dev\\doctor-appointment-app-4b\\storage\\framework\\views',
  ),
  'app' => 
  array (
    'name' => 'Simify',
    'env' => 'local',
    'debug' => true,
    'url' => 'http://localhost:8000',
    'frontend_url' => 'http://localhost:3000',
    'asset_url' => NULL,
    'timezone' => 'America/Merida',
    'locale' => 'es',
    'fallback_locale' => 'en',
    'faker_locale' => 'en_ES*',
    'cipher' => 'AES-256-CBC',
    'key' => 'base64:iDWqI5Y1w0Fia0XFey1MByUkI8fBu6lem/R65AuCNQ4=',
    'previous_keys' => 
    array (
    ),
    'maintenance' => 
    array (
      'driver' => 'file',
      'store' => 'database',
    ),
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Concurrency\\ConcurrencyServiceProvider',
      6 => 'Illuminate\\Cookie\\CookieServiceProvider',
      7 => 'Illuminate\\Database\\DatabaseServiceProvider',
      8 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      9 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      10 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      11 => 'Illuminate\\Hashing\\HashServiceProvider',
      12 => 'Illuminate\\Mail\\MailServiceProvider',
      13 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      14 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      15 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      16 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      17 => 'Illuminate\\Queue\\QueueServiceProvider',
      18 => 'Illuminate\\Redis\\RedisServiceProvider',
      19 => 'Illuminate\\Session\\SessionServiceProvider',
      20 => 'Illuminate\\Translation\\TranslationServiceProvider',
      21 => 'Illuminate\\Validation\\ValidationServiceProvider',
      22 => 'Illuminate\\View\\ViewServiceProvider',
      23 => 'App\\Providers\\AppServiceProvider',
      24 => 'App\\Providers\\FortifyServiceProvider',
      25 => 'App\\Providers\\JetstreamServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Arr' => 'Illuminate\\Support\\Arr',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Benchmark' => 'Illuminate\\Support\\Benchmark',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Concurrency' => 'Illuminate\\Support\\Facades\\Concurrency',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Context' => 'Illuminate\\Support\\Facades\\Context',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'Date' => 'Illuminate\\Support\\Facades\\Date',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Http' => 'Illuminate\\Support\\Facades\\Http',
      'Js' => 'Illuminate\\Support\\Js',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Number' => 'Illuminate\\Support\\Number',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Process' => 'Illuminate\\Support\\Facades\\Process',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'RateLimiter' => 'Illuminate\\Support\\Facades\\RateLimiter',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schedule' => 'Illuminate\\Support\\Facades\\Schedule',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'Str' => 'Illuminate\\Support\\Str',
      'Uri' => 'Illuminate\\Support\\Uri',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Vite' => 'Illuminate\\Support\\Facades\\Vite',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'sanctum' => 
      array (
        'driver' => 'sanctum',
        'provider' => NULL,
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\User',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_reset_tokens',
        'expire' => 60,
        'throttle' => 60,
      ),
    ),
    'password_timeout' => 10800,
  ),
  'cache' => 
  array (
    'default' => 'database',
    'stores' => 
    array (
      'array' => 
      array (
        'driver' => 'array',
        'serialize' => false,
      ),
      'database' => 
      array (
        'driver' => 'database',
        'connection' => NULL,
        'table' => 'cache',
        'lock_connection' => NULL,
        'lock_table' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => 'C:\\dev\\doctor-appointment-app-4b\\storage\\framework/cache/data',
        'lock_path' => 'C:\\dev\\doctor-appointment-app-4b\\storage\\framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'cache',
        'lock_connection' => 'default',
      ),
      'dynamodb' => 
      array (
        'driver' => 'dynamodb',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'table' => 'cache',
        'endpoint' => NULL,
      ),
      'octane' => 
      array (
        'driver' => 'octane',
      ),
    ),
    'prefix' => 'simify-cache-',
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'url' => NULL,
        'database' => 'appointment_db_4b',
        'prefix' => '',
        'foreign_key_constraints' => true,
        'busy_timeout' => NULL,
        'journal_mode' => NULL,
        'synchronous' => NULL,
        'transaction_mode' => 'DEFERRED',
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'appointment_db_4b',
        'username' => 'laravel',
        'password' => 'lararavel123',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'mariadb' => 
      array (
        'driver' => 'mariadb',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'appointment_db_4b',
        'username' => 'laravel',
        'password' => 'lararavel123',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'appointment_db_4b',
        'username' => 'laravel',
        'password' => 'lararavel123',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
        'search_path' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'appointment_db_4b',
        'username' => 'laravel',
        'password' => 'lararavel123',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
      ),
    ),
    'migrations' => 
    array (
      'table' => 'migrations',
      'update_date_on_publish' => true,
    ),
    'redis' => 
    array (
      'client' => 'phpredis',
      'options' => 
      array (
        'cluster' => 'redis',
        'prefix' => 'simify-database-',
        'persistent' => false,
      ),
      'default' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '0',
        'max_retries' => 3,
        'backoff_algorithm' => 'decorrelated_jitter',
        'backoff_base' => 100,
        'backoff_cap' => 1000,
      ),
      'cache' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '1',
        'max_retries' => 3,
        'backoff_algorithm' => 'decorrelated_jitter',
        'backoff_base' => 100,
        'backoff_cap' => 1000,
      ),
    ),
  ),
  'filesystems' => 
  array (
    'default' => 'public',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\dev\\doctor-appointment-app-4b\\storage\\app/private',
        'serve' => true,
        'throw' => false,
        'report' => false,
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => 'C:\\dev\\doctor-appointment-app-4b\\storage\\app/public',
        'url' => 'http://localhost:8000/storage',
        'visibility' => 'public',
        'throw' => false,
        'report' => false,
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'bucket' => '',
        'url' => NULL,
        'endpoint' => NULL,
        'use_path_style_endpoint' => false,
        'throw' => false,
        'report' => false,
      ),
    ),
    'links' => 
    array (
      'C:\\dev\\doctor-appointment-app-4b\\public\\storage' => 'C:\\dev\\doctor-appointment-app-4b\\storage\\app/public',
    ),
  ),
  'fortify-options' => 
  array (
    'two-factor-authentication' => 
    array (
      'confirm' => true,
      'confirmPassword' => true,
    ),
  ),
  'fortify' => 
  array (
    'guard' => 'web',
    'middleware' => 
    array (
      0 => 'web',
    ),
    'auth_middleware' => 'auth',
    'passwords' => 'users',
    'username' => 'email',
    'email' => 'email',
    'views' => true,
    'home' => '/',
    'prefix' => '',
    'domain' => NULL,
    'lowercase_usernames' => true,
    'limiters' => 
    array (
      'login' => 'login',
      'two-factor' => 'two-factor',
    ),
    'paths' => 
    array (
      'login' => NULL,
      'logout' => NULL,
      'password' => 
      array (
        'request' => NULL,
        'reset' => NULL,
        'email' => NULL,
        'update' => NULL,
        'confirm' => NULL,
        'confirmation' => NULL,
      ),
      'register' => NULL,
      'verification' => 
      array (
        'notice' => NULL,
        'verify' => NULL,
        'send' => NULL,
      ),
      'user-profile-information' => 
      array (
        'update' => NULL,
      ),
      'user-password' => 
      array (
        'update' => NULL,
      ),
      'two-factor' => 
      array (
        'login' => NULL,
        'enable' => NULL,
        'confirm' => NULL,
        'disable' => NULL,
        'qr-code' => NULL,
        'secret-key' => NULL,
        'recovery-codes' => NULL,
      ),
    ),
    'redirects' => 
    array (
      'login' => NULL,
      'logout' => NULL,
      'password-confirmation' => NULL,
      'register' => NULL,
      'email-verification' => NULL,
      'password-reset' => NULL,
    ),
    'features' => 
    array (
      0 => 'registration',
      1 => 'reset-passwords',
      2 => 'update-profile-information',
      3 => 'update-passwords',
      4 => 'two-factor-authentication',
    ),
  ),
  'jetstream' => 
  array (
    'stack' => 'livewire',
    'middleware' => 
    array (
      0 => 'web',
    ),
    'features' => 
    array (
      0 => 'profile-photos',
      1 => 'account-deletion',
    ),
    'profile_photo_disk' => 'public',
    'auth_session' => 'Laravel\\Jetstream\\Http\\Middleware\\AuthenticateSession',
    'guard' => 'sanctum',
  ),
  'livewire-tables' => 
  array (
    'theme' => 'tailwind',
    'cache_assets' => true,
    'inject_core_assets_enabled' => true,
    'inject_third_party_assets_enabled' => true,
    'enable_blade_directives' => false,
    'use_json_translations' => false,
    'script_base_path' => '/rappasoft/laravel-livewire-tables',
    'dateFilter' => 
    array (
      'defaultConfig' => 
      array (
        'format' => 'Y-m-d',
        'pillFormat' => 'd M Y',
      ),
    ),
    'dateTimeFilter' => 
    array (
      'defaultConfig' => 
      array (
        'format' => 'Y-m-d\\TH:i',
        'pillFormat' => 'd M Y - H:i',
      ),
    ),
    'dateRange' => 
    array (
      'defaultOptions' => 
      array (
      ),
      'defaultConfig' => 
      array (
        'allowInput' => true,
        'altFormat' => 'F j, Y',
        'ariaDateFormat' => 'F j, Y',
        'dateFormat' => 'Y-m-d',
        'earliestDate' => NULL,
        'latestDate' => NULL,
        'locale' => 'en',
      ),
    ),
    'numberRange' => 
    array (
      'defaultOptions' => 
      array (
        'min' => 0,
        'max' => 100,
      ),
      'defaultConfig' => 
      array (
        'minRange' => 0,
        'maxRange' => 100,
        'suffix' => '',
        'prefix' => '',
      ),
    ),
    'selectFilter' => 
    array (
      'defaultOptions' => 
      array (
      ),
      'defaultConfig' => 
      array (
      ),
    ),
    'multiSelectFilter' => 
    array (
      'defaultOptions' => 
      array (
      ),
      'defaultConfig' => 
      array (
      ),
    ),
    'multiSelectDropdownFilter' => 
    array (
      'defaultOptions' => 
      array (
      ),
      'defaultConfig' => 
      array (
      ),
    ),
    'events' => 
    array (
      'enableUserForEvent' => true,
    ),
  ),
  'logging' => 
  array (
    'default' => 'stack',
    'deprecations' => 
    array (
      'channel' => NULL,
      'trace' => false,
    ),
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'single',
        ),
        'ignore_exceptions' => false,
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => 'C:\\dev\\doctor-appointment-app-4b\\storage\\logs/laravel.log',
        'level' => 'debug',
        'replace_placeholders' => true,
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => 'C:\\dev\\doctor-appointment-app-4b\\storage\\logs/laravel.log',
        'level' => 'debug',
        'days' => 14,
        'replace_placeholders' => true,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'debug',
        'replace_placeholders' => true,
      ),
      'papertrail' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\SyslogUdpHandler',
        'handler_with' => 
        array (
          'host' => NULL,
          'port' => NULL,
          'connectionString' => 'tls://:',
        ),
        'processors' => 
        array (
          0 => 'Monolog\\Processor\\PsrLogMessageProcessor',
        ),
      ),
      'stderr' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\StreamHandler',
        'handler_with' => 
        array (
          'stream' => 'php://stderr',
        ),
        'formatter' => NULL,
        'processors' => 
        array (
          0 => 'Monolog\\Processor\\PsrLogMessageProcessor',
        ),
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
        'facility' => 8,
        'replace_placeholders' => true,
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
        'replace_placeholders' => true,
      ),
      'null' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\NullHandler',
      ),
      'emergency' => 
      array (
        'path' => 'C:\\dev\\doctor-appointment-app-4b\\storage\\logs/laravel.log',
      ),
    ),
  ),
  'mail' => 
  array (
    'default' => 'log',
    'mailers' => 
    array (
      'smtp' => 
      array (
        'transport' => 'smtp',
        'scheme' => NULL,
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '2525',
        'username' => NULL,
        'password' => NULL,
        'timeout' => NULL,
        'local_domain' => 'localhost',
      ),
      'ses' => 
      array (
        'transport' => 'ses',
      ),
      'postmark' => 
      array (
        'transport' => 'postmark',
      ),
      'resend' => 
      array (
        'transport' => 'resend',
      ),
      'sendmail' => 
      array (
        'transport' => 'sendmail',
        'path' => '/usr/sbin/sendmail -bs -i',
      ),
      'log' => 
      array (
        'transport' => 'log',
        'channel' => NULL,
      ),
      'array' => 
      array (
        'transport' => 'array',
      ),
      'failover' => 
      array (
        'transport' => 'failover',
        'mailers' => 
        array (
          0 => 'smtp',
          1 => 'log',
        ),
        'retry_after' => 60,
      ),
      'roundrobin' => 
      array (
        'transport' => 'roundrobin',
        'mailers' => 
        array (
          0 => 'ses',
          1 => 'postmark',
        ),
        'retry_after' => 60,
      ),
    ),
    'from' => 
    array (
      'address' => 'hello@example.com',
      'name' => 'Simify',
    ),
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => 'C:\\dev\\doctor-appointment-app-4b\\resources\\views/vendor/mail',
      ),
    ),
  ),
  'permission' => 
  array (
    'models' => 
    array (
      'permission' => 'Spatie\\Permission\\Models\\Permission',
      'role' => 'Spatie\\Permission\\Models\\Role',
    ),
    'table_names' => 
    array (
      'roles' => 'roles',
      'permissions' => 'permissions',
      'model_has_permissions' => 'model_has_permissions',
      'model_has_roles' => 'model_has_roles',
      'role_has_permissions' => 'role_has_permissions',
    ),
    'column_names' => 
    array (
      'role_pivot_key' => NULL,
      'permission_pivot_key' => NULL,
      'model_morph_key' => 'model_id',
      'team_foreign_key' => 'team_id',
    ),
    'register_permission_check_method' => true,
    'register_octane_reset_listener' => false,
    'events_enabled' => false,
    'teams' => false,
    'team_resolver' => 'Spatie\\Permission\\DefaultTeamResolver',
    'use_passport_client_credentials' => false,
    'display_permission_in_exception' => false,
    'display_role_in_exception' => false,
    'enable_wildcard_permission' => false,
    'cache' => 
    array (
      'expiration_time' => 
      \DateInterval::__set_state(array(
         'from_string' => true,
         'date_string' => '24 hours',
      )),
      'key' => 'spatie.permission.cache',
      'store' => 'default',
    ),
  ),
  'queue' => 
  array (
    'default' => 'database',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'connection' => NULL,
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
        'after_commit' => false,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => 0,
        'after_commit' => false,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => '',
        'secret' => '',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'default',
        'suffix' => NULL,
        'region' => 'us-east-1',
        'after_commit' => false,
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => NULL,
        'after_commit' => false,
      ),
    ),
    'batching' => 
    array (
      'database' => 'mysql',
      'table' => 'job_batches',
    ),
    'failed' => 
    array (
      'driver' => 'database-uuids',
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'sanctum' => 
  array (
    'stateful' => 
    array (
      0 => 'localhost',
      1 => 'localhost:3000',
      2 => '127.0.0.1',
      3 => '127.0.0.1:8000',
      4 => '::1',
      5 => 'localhost:8000',
    ),
    'guard' => 
    array (
      0 => 'web',
    ),
    'expiration' => NULL,
    'token_prefix' => '',
    'middleware' => 
    array (
      'authenticate_session' => 'Laravel\\Sanctum\\Http\\Middleware\\AuthenticateSession',
      'encrypt_cookies' => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
      'validate_csrf_token' => 'Illuminate\\Foundation\\Http\\Middleware\\ValidateCsrfToken',
    ),
  ),
  'services' => 
  array (
    'postmark' => 
    array (
      'token' => NULL,
    ),
    'resend' => 
    array (
      'key' => NULL,
    ),
    'ses' => 
    array (
      'key' => '',
      'secret' => '',
      'region' => 'us-east-1',
    ),
    'slack' => 
    array (
      'notifications' => 
      array (
        'bot_user_oauth_token' => NULL,
        'channel' => NULL,
      ),
    ),
  ),
  'session' => 
  array (
    'driver' => 'database',
    'lifetime' => 120,
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => 'C:\\dev\\doctor-appointment-app-4b\\storage\\framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'simify-session',
    'path' => '/',
    'domain' => NULL,
    'secure' => NULL,
    'http_only' => true,
    'same_site' => 'lax',
    'partitioned' => false,
  ),
  'wireui' => 
  array (
    'prefix' => 'wire-',
    'style' => 
    array (
      'shadow' => 'base',
      'rounded' => 'md',
      'color' => 'primary',
    ),
    'alert' => 
    array (
      'default' => 
      array (
        'color' => 'global',
        'rounded' => 'global',
        'variant' => 'flat',
        'padding' => 'medium',
      ),
      'packs' => 
      array (
        'shadows' => 'WireUi\\WireUi\\Shadow',
        'rounders' => 'WireUi\\WireUi\\Rounded',
        'paddings' => 'WireUi\\Components\\Alert\\WireUi\\Padding',
        'variants' => 'WireUi\\Components\\Alert\\WireUi\\Variant',
      ),
    ),
    'avatar' => 
    array (
      'default' => 
      array (
        'size' => 'md',
        'border' => 'thin',
        'rounded' => 'full',
        'color' => 'secondary',
      ),
      'packs' => 
      array (
        'rounders' => 'WireUi\\WireUi\\Rounded',
        'sizes' => 'WireUi\\Components\\Avatar\\WireUi\\Size',
        'colors' => 'WireUi\\Components\\Avatar\\WireUi\\Color',
        'borders' => 'WireUi\\Components\\Avatar\\WireUi\\Border',
        'icon-sizes' => 'WireUi\\Components\\Avatar\\WireUi\\IconSize',
      ),
    ),
    'badge' => 
    array (
      'default' => 
      array (
        'color' => 'global',
        'rounded' => 'global',
        'size' => 'sm',
        'variant' => 'solid',
      ),
      'packs' => 
      array (
        'rounders' => 'WireUi\\WireUi\\Rounded',
        'variants' => 'WireUi\\Components\\Badge\\WireUi\\Variant',
        'icon-sizes' => 'WireUi\\Components\\Badge\\WireUi\\IconSize',
        'sizes' => 'WireUi\\Components\\Badge\\WireUi\\Size\\Base',
      ),
    ),
    'mini-badge' => 
    array (
      'default' => 
      array (
        'color' => 'global',
        'rounded' => 'global',
        'size' => 'sm',
        'variant' => 'solid',
      ),
      'packs' => 
      array (
        'rounders' => 'WireUi\\WireUi\\Rounded',
        'variants' => 'WireUi\\Components\\Badge\\WireUi\\Variant',
        'icon-sizes' => 'WireUi\\Components\\Badge\\WireUi\\IconSize',
        'sizes' => 'WireUi\\Components\\Badge\\WireUi\\Size\\Mini',
      ),
    ),
    'button' => 
    array (
      'default' => 
      array (
        'color' => 'global',
        'rounded' => 'global',
        'size' => 'md',
        'variant' => 'solid',
      ),
      'packs' => 
      array (
        'rounders' => 'WireUi\\WireUi\\Rounded',
        'variants' => 'WireUi\\Components\\Button\\WireUi\\Variant',
        'icon-sizes' => 'WireUi\\Components\\Button\\WireUi\\IconSize',
        'sizes' => 'WireUi\\Components\\Button\\WireUi\\Size\\Base',
      ),
    ),
    'mini-button' => 
    array (
      'default' => 
      array (
        'color' => 'global',
        'rounded' => 'global',
        'size' => 'md',
        'variant' => 'solid',
      ),
      'packs' => 
      array (
        'rounders' => 'WireUi\\WireUi\\Rounded',
        'variants' => 'WireUi\\Components\\Button\\WireUi\\Variant',
        'icon-sizes' => 'WireUi\\Components\\Button\\WireUi\\IconSize',
        'sizes' => 'WireUi\\Components\\Button\\WireUi\\Size\\Mini',
      ),
    ),
    'card' => 
    array (
      'default' => 
      array (
        'rounded' => 'global',
        'color' => 'base',
        'variant' => 'flat',
        'padding' => 'medium',
      ),
      'packs' => 
      array (
        'shadows' => 'WireUi\\WireUi\\Shadow',
        'colors' => 'WireUi\\Components\\Card\\WireUi\\Color',
        'paddings' => 'WireUi\\Components\\Card\\WireUi\\Padding',
        'rounders' => 'WireUi\\Components\\Card\\WireUi\\Rounded',
      ),
    ),
    'checkbox' => 
    array (
      'default' => 
      array (
        'color' => 'global',
        'size' => 'sm',
        'rounded' => 'base',
      ),
      'packs' => 
      array (
        'rounders' => 'WireUi\\WireUi\\Rounded',
        'sizes' => 'WireUi\\Components\\Switcher\\WireUi\\Checkbox\\Size',
        'colors' => 'WireUi\\Components\\Switcher\\WireUi\\Checkbox\\Color',
      ),
    ),
    'color-picker' => 
    array (
      'default' => 
      array (
        'color' => 'global',
        'shadow' => 'global',
        'rounded' => 'global',
      ),
      'packs' => 
      array (
        'shadows' => 'WireUi\\WireUi\\Shadow',
        'colors' => 'WireUi\\Components\\Wrapper\\WireUi\\Color',
        'rounders' => 'WireUi\\Components\\Wrapper\\WireUi\\Rounded',
      ),
    ),
    'datetime-picker' => 
    array (
      'default' => 
      array (
        'color' => 'global',
        'shadow' => 'global',
        'rounded' => 'global',
        'interval' => 10,
        'timezone' => NULL,
        'right-icon' => 'calendar',
        'time-format' => 12,
        'parse-format' => NULL,
        'without-time' => false,
        'without-tips' => false,
        'user-timezone' => NULL,
        'display-format' => NULL,
        'without-timezone' => false,
      ),
      'packs' => 
      array (
        'shadows' => 'WireUi\\WireUi\\Shadow',
        'colors' => 'WireUi\\Components\\Wrapper\\WireUi\\Color',
        'rounders' => 'WireUi\\Components\\Wrapper\\WireUi\\Rounded',
      ),
    ),
    'dialog' => 
    array (
      'default' => 
      array (
        'z-index' => 'z-60',
        'blur' => 'none',
        'type' => 'base',
        'width' => '2xl',
        'align' => 'start',
      ),
      'packs' => 
      array (
        'blurs' => 'WireUi\\Components\\Modal\\WireUi\\Blur',
        'types' => 'WireUi\\Components\\Modal\\WireUi\\Type',
        'widths' => 'WireUi\\Components\\Modal\\WireUi\\Width',
        'aligns' => 'WireUi\\Components\\Modal\\WireUi\\Align',
      ),
    ),
    'dropdown' => 
    array (
      'default' => 
      array (
        'width' => 'lg',
        'height' => '3xl',
        'position' => 'bottom-start',
      ),
      'packs' => 
      array (
        'widths' => 'WireUi\\Components\\Dropdown\\WireUi\\Width',
        'heights' => 'WireUi\\Components\\Dropdown\\WireUi\\Height',
      ),
    ),
    'icon' => 
    array (
      'variant' => 'outline',
    ),
    'input' => 
    array (
      'default' => 
      array (
        'color' => 'global',
        'shadow' => 'global',
        'rounded' => 'global',
      ),
      'packs' => 
      array (
        'shadows' => 'WireUi\\WireUi\\Shadow',
        'colors' => 'WireUi\\Components\\Wrapper\\WireUi\\Color',
        'rounders' => 'WireUi\\Components\\Wrapper\\WireUi\\Rounded',
      ),
    ),
    'currency' => 
    array (
      'default' => 
      array (
        'color' => 'global',
        'shadow' => 'global',
        'rounded' => 'global',
      ),
      'packs' => 
      array (
        'shadows' => 'WireUi\\WireUi\\Shadow',
        'colors' => 'WireUi\\Components\\Wrapper\\WireUi\\Color',
        'rounders' => 'WireUi\\Components\\Wrapper\\WireUi\\Rounded',
      ),
    ),
    'maskable' => 
    array (
      'default' => 
      array (
        'color' => 'global',
        'shadow' => 'global',
        'rounded' => 'global',
      ),
      'packs' => 
      array (
        'shadows' => 'WireUi\\WireUi\\Shadow',
        'colors' => 'WireUi\\Components\\Wrapper\\WireUi\\Color',
        'rounders' => 'WireUi\\Components\\Wrapper\\WireUi\\Rounded',
      ),
    ),
    'number' => 
    array (
      'default' => 
      array (
        'color' => 'global',
        'shadow' => 'global',
        'rounded' => 'global',
      ),
      'packs' => 
      array (
        'shadows' => 'WireUi\\WireUi\\Shadow',
        'colors' => 'WireUi\\Components\\Wrapper\\WireUi\\Color',
        'rounders' => 'WireUi\\Components\\Wrapper\\WireUi\\Rounded',
      ),
    ),
    'password' => 
    array (
      'default' => 
      array (
        'color' => 'global',
        'shadow' => 'global',
        'rounded' => 'global',
      ),
      'packs' => 
      array (
        'shadows' => 'WireUi\\WireUi\\Shadow',
        'colors' => 'WireUi\\Components\\Wrapper\\WireUi\\Color',
        'rounders' => 'WireUi\\Components\\Wrapper\\WireUi\\Rounded',
      ),
    ),
    'phone' => 
    array (
      'default' => 
      array (
        'color' => 'global',
        'shadow' => 'global',
        'rounded' => 'global',
      ),
      'packs' => 
      array (
        'shadows' => 'WireUi\\WireUi\\Shadow',
        'colors' => 'WireUi\\Components\\Wrapper\\WireUi\\Color',
        'rounders' => 'WireUi\\Components\\Wrapper\\WireUi\\Rounded',
      ),
    ),
    'link' => 
    array (
      'default' => 
      array (
        'size' => 'md',
        'color' => 'primary',
        'underline' => 'hover',
      ),
      'packs' => 
      array (
        'sizes' => 'WireUi\\Components\\Link\\WireUi\\Size',
        'colors' => 'WireUi\\Components\\Link\\WireUi\\Color',
        'underlines' => 'WireUi\\Components\\Link\\WireUi\\Underline',
      ),
    ),
    'modal' => 
    array (
      'default' => 
      array (
        'z-index' => 'z-50',
        'blur' => 'none',
        'type' => 'base',
        'width' => '2xl',
        'align' => 'start',
      ),
      'packs' => 
      array (
        'blurs' => 'WireUi\\Components\\Modal\\WireUi\\Blur',
        'types' => 'WireUi\\Components\\Modal\\WireUi\\Type',
        'widths' => 'WireUi\\Components\\Modal\\WireUi\\Width',
        'aligns' => 'WireUi\\Components\\Modal\\WireUi\\Align',
      ),
    ),
    'modal-card' => 
    array (
      'default' => 
      array (
        'z-index' => 'z-50',
        'blur' => 'none',
        'type' => 'base',
        'width' => '2xl',
        'align' => 'start',
      ),
      'packs' => 
      array (
        'blurs' => 'WireUi\\Components\\Modal\\WireUi\\Blur',
        'types' => 'WireUi\\Components\\Modal\\WireUi\\Type',
        'widths' => 'WireUi\\Components\\Modal\\WireUi\\Width',
        'aligns' => 'WireUi\\Components\\Modal\\WireUi\\Align',
      ),
    ),
    'native-select' => 
    array (
      'default' => 
      array (
        'color' => 'global',
        'shadow' => 'global',
        'rounded' => 'global',
      ),
      'packs' => 
      array (
        'shadows' => 'WireUi\\WireUi\\Shadow',
        'colors' => 'WireUi\\Components\\Wrapper\\WireUi\\Color',
        'rounders' => 'WireUi\\Components\\Wrapper\\WireUi\\Rounded',
      ),
    ),
    'notifications' => 
    array (
      'default' => 
      array (
        'z-index' => 'z-70',
        'position' => 'top-end',
      ),
      'packs' => 
      array (
        'positions' => 'WireUi\\Components\\Notifications\\WireUi\\Position',
      ),
    ),
    'radio' => 
    array (
      'default' => 
      array (
        'color' => 'global',
        'size' => 'sm',
        'rounded' => 'full',
      ),
      'packs' => 
      array (
        'rounders' => 'WireUi\\WireUi\\Rounded',
        'sizes' => 'WireUi\\Components\\Switcher\\WireUi\\Radio\\Size',
        'colors' => 'WireUi\\Components\\Switcher\\WireUi\\Radio\\Color',
      ),
    ),
    'select' => 
    array (
      'default' => 
      array (
        'color' => 'global',
        'shadow' => 'global',
        'rounded' => 'global',
      ),
      'packs' => 
      array (
        'shadows' => 'WireUi\\WireUi\\Shadow',
        'colors' => 'WireUi\\Components\\Wrapper\\WireUi\\Color',
        'rounders' => 'WireUi\\Components\\Wrapper\\WireUi\\Rounded',
      ),
    ),
    'textarea' => 
    array (
      'default' => 
      array (
        'color' => 'global',
        'shadow' => 'global',
        'rounded' => 'global',
      ),
      'packs' => 
      array (
        'shadows' => 'WireUi\\WireUi\\Shadow',
        'colors' => 'WireUi\\Components\\Wrapper\\WireUi\\Color',
        'rounders' => 'WireUi\\Components\\Wrapper\\WireUi\\Rounded',
      ),
    ),
    'time-picker' => 
    array (
      'default' => 
      array (
        'color' => 'global',
        'shadow' => 'global',
        'rounded' => 'global',
        'right-icon' => 'clock',
        'military-time' => false,
        'without-seconds' => false,
      ),
      'packs' => 
      array (
        'shadows' => 'WireUi\\WireUi\\Shadow',
        'colors' => 'WireUi\\Components\\Wrapper\\WireUi\\Color',
        'rounders' => 'WireUi\\Components\\Wrapper\\WireUi\\Rounded',
      ),
    ),
    'time-selector' => 
    array (
      'default' => 
      array (
        'borderless' => false,
        'shadowless' => false,
        'military-time' => false,
        'without-seconds' => false,
      ),
      'packs' => 
      array (
        'shadows' => 'WireUi\\WireUi\\Shadow',
        'rounders' => 'WireUi\\WireUi\\Rounded',
      ),
    ),
    'toggle' => 
    array (
      'default' => 
      array (
        'color' => 'global',
        'size' => 'sm',
        'rounded' => 'full',
      ),
      'packs' => 
      array (
        'rounders' => 'WireUi\\WireUi\\Rounded',
        'sizes' => 'WireUi\\Components\\Switcher\\WireUi\\Toggle\\Size',
        'colors' => 'WireUi\\Components\\Switcher\\WireUi\\Toggle\\Color',
      ),
    ),
    'components' => 
    array (
      'alert' => 
      array (
        'class' => 'WireUi\\Components\\Alert\\Index',
        'alias' => 'alert',
      ),
      'avatar' => 
      array (
        'class' => 'WireUi\\Components\\Avatar\\Index',
        'alias' => 'avatar',
      ),
      'badge' => 
      array (
        'class' => 'WireUi\\Components\\Badge\\Base',
        'alias' => 'badge',
      ),
      'mini-badge' => 
      array (
        'class' => 'WireUi\\Components\\Badge\\Mini',
        'alias' => 'mini-badge',
      ),
      'button' => 
      array (
        'class' => 'WireUi\\Components\\Button\\Base',
        'alias' => 'button',
      ),
      'mini-button' => 
      array (
        'class' => 'WireUi\\Components\\Button\\Mini',
        'alias' => 'mini-button',
      ),
      'card' => 
      array (
        'class' => 'WireUi\\Components\\Card\\Index',
        'alias' => 'card',
      ),
      'checkbox' => 
      array (
        'class' => 'WireUi\\Components\\Switcher\\Checkbox',
        'alias' => 'checkbox',
      ),
      'color-picker' => 
      array (
        'class' => 'WireUi\\Components\\ColorPicker\\Picker',
        'alias' => 'color-picker',
      ),
      'datetime-picker' => 
      array (
        'class' => 'WireUi\\Components\\DatetimePicker\\Picker',
        'alias' => 'datetime-picker',
      ),
      'description' => 
      array (
        'class' => 'WireUi\\Components\\Label\\Description',
        'alias' => 'description',
      ),
      'dialog' => 
      array (
        'class' => 'WireUi\\Components\\Dialog\\Index',
        'alias' => 'dialog',
      ),
      'dropdown' => 
      array (
        'class' => 'WireUi\\Components\\Dropdown\\Base',
        'alias' => 'dropdown',
      ),
      'dropdown.item' => 
      array (
        'class' => 'WireUi\\Components\\Dropdown\\Item',
        'alias' => 'dropdown.item',
      ),
      'dropdown.header' => 
      array (
        'class' => 'WireUi\\Components\\Dropdown\\Header',
        'alias' => 'dropdown.header',
      ),
      'error' => 
      array (
        'class' => 'WireUi\\Components\\Errors\\Single',
        'alias' => 'error',
      ),
      'errors' => 
      array (
        'class' => 'WireUi\\Components\\Errors\\Multiple',
        'alias' => 'errors',
      ),
      'icon' => 
      array (
        'class' => 'WireUi\\Components\\Icon\\Index',
        'alias' => 'icon',
      ),
      'input' => 
      array (
        'class' => 'WireUi\\Components\\TextField\\Input',
        'alias' => 'input',
      ),
      'currency' => 
      array (
        'class' => 'WireUi\\Components\\TextField\\Currency',
        'alias' => 'currency',
      ),
      'maskable' => 
      array (
        'class' => 'WireUi\\Components\\TextField\\Maskable',
        'alias' => 'maskable',
      ),
      'number' => 
      array (
        'class' => 'WireUi\\Components\\TextField\\Number',
        'alias' => 'number',
      ),
      'password' => 
      array (
        'class' => 'WireUi\\Components\\TextField\\Password',
        'alias' => 'password',
      ),
      'phone' => 
      array (
        'class' => 'WireUi\\Components\\TextField\\Phone',
        'alias' => 'phone',
      ),
      'label' => 
      array (
        'class' => 'WireUi\\Components\\Label\\Base',
        'alias' => 'label',
      ),
      'link' => 
      array (
        'class' => 'WireUi\\Components\\Link\\Index',
        'alias' => 'link',
      ),
      'modal' => 
      array (
        'class' => 'WireUi\\Components\\Modal\\Index',
        'alias' => 'modal',
      ),
      'modal-card' => 
      array (
        'class' => 'WireUi\\Components\\Modal\\Card',
        'alias' => 'modal-card',
      ),
      'native-select' => 
      array (
        'class' => 'WireUi\\Components\\Select\\Native',
        'alias' => 'native-select',
      ),
      'notifications' => 
      array (
        'class' => 'WireUi\\Components\\Notifications\\Index',
        'alias' => 'notifications',
      ),
      'radio' => 
      array (
        'class' => 'WireUi\\Components\\Switcher\\Radio',
        'alias' => 'radio',
      ),
      'select' => 
      array (
        'class' => 'WireUi\\Components\\Select\\Base',
        'alias' => 'select',
      ),
      'select.option' => 
      array (
        'class' => 'WireUi\\Components\\Select\\Option',
        'alias' => 'select.option',
      ),
      'select.user-option' => 
      array (
        'class' => 'WireUi\\Components\\Select\\UserOption',
        'alias' => 'select.user-option',
      ),
      'textarea' => 
      array (
        'class' => 'WireUi\\Components\\TextField\\Textarea',
        'alias' => 'textarea',
      ),
      'time-picker' => 
      array (
        'class' => 'WireUi\\Components\\TimePicker\\Picker',
        'alias' => 'time-picker',
      ),
      'time-selector' => 
      array (
        'class' => 'WireUi\\Components\\TimePicker\\Selector',
        'alias' => 'time-selector',
      ),
      'toggle' => 
      array (
        'class' => 'WireUi\\Components\\Switcher\\Toggle',
        'alias' => 'toggle',
      ),
      'popover' => 
      array (
        'class' => 'WireUi\\Components\\Popover\\Index',
        'alias' => 'popover',
      ),
      'switcher' => 
      array (
        'class' => 'WireUi\\Components\\Wrapper\\Switcher',
        'alias' => 'switcher',
      ),
      'text-field' => 
      array (
        'class' => 'WireUi\\Components\\Wrapper\\TextField',
        'alias' => 'text-field',
      ),
    ),
    'heroicons' => 
    array (
      'variant' => 'outline',
      'alias' => 'heroicons',
    ),
  ),
  'blade-heroicons' => 
  array (
    'prefix' => 'heroicon',
    'fallback' => '',
    'class' => '',
    'attributes' => 
    array (
    ),
  ),
  'blade-icons' => 
  array (
    'sets' => 
    array (
    ),
    'class' => '',
    'attributes' => 
    array (
    ),
    'fallback' => '',
    'components' => 
    array (
      'disabled' => false,
      'default' => 'icon',
    ),
  ),
  'localization-private' => 
  array (
    'plugins' => 
    array (
      'C:\\dev\\doctor-appointment-app-4b\\vendor\\laravel-lang\\actions' => 
      array (
        0 => 'LaravelLang\\Actions\\Plugins\\Main',
      ),
      'C:\\dev\\doctor-appointment-app-4b\\vendor\\laravel-lang\\attributes' => 
      array (
        0 => 'LaravelLang\\Attributes\\Plugins\\Laravel',
        1 => 'LaravelLang\\Attributes\\Plugins\\Lumen',
      ),
      'C:\\dev\\doctor-appointment-app-4b\\vendor\\laravel-lang\\http-statuses' => 
      array (
        0 => 'LaravelLang\\HttpStatuses\\Plugins\\Main',
      ),
      'C:\\dev\\doctor-appointment-app-4b\\vendor\\laravel-lang\\lang' => 
      array (
        0 => 'LaravelLang\\Lang\\Plugins\\Breeze\\Master',
        1 => 'LaravelLang\\Lang\\Plugins\\Breeze\\V2',
        2 => 'LaravelLang\\Lang\\Plugins\\Cashier\\Stripe\\Master',
        3 => 'LaravelLang\\Lang\\Plugins\\Cashier\\Stripe\\V15',
        4 => 'LaravelLang\\Lang\\Plugins\\Fortify\\Master',
        5 => 'LaravelLang\\Lang\\Plugins\\Fortify\\V1',
        6 => 'LaravelLang\\Lang\\Plugins\\Jetstream\\Master',
        7 => 'LaravelLang\\Lang\\Plugins\\Jetstream\\V5',
        8 => 'LaravelLang\\Lang\\Plugins\\Laravel\\Master',
        9 => 'LaravelLang\\Lang\\Plugins\\Laravel\\V11',
        10 => 'LaravelLang\\Lang\\Plugins\\Laravel\\V12',
        11 => 'LaravelLang\\Lang\\Plugins\\Nova\\DuskSuite\\Main',
        12 => 'LaravelLang\\Lang\\Plugins\\Nova\\LogViewer\\Main',
        13 => 'LaravelLang\\Lang\\Plugins\\Nova\\V4',
        14 => 'LaravelLang\\Lang\\Plugins\\Nova\\V5',
        15 => 'LaravelLang\\Lang\\Plugins\\Spark\\Paddle',
        16 => 'LaravelLang\\Lang\\Plugins\\Spark\\Stripe',
        17 => 'LaravelLang\\Lang\\Plugins\\UI\\Master',
        18 => 'LaravelLang\\Lang\\Plugins\\UI\\V4',
      ),
      'C:\\dev\\doctor-appointment-app-4b\\vendor\\laravel-lang\\moonshine' => 
      array (
        0 => 'LaravelLang\\MoonShine\\Plugins\\V3',
      ),
      'C:\\dev\\doctor-appointment-app-4b\\vendor\\laravel-lang\\starter-kits' => 
      array (
        0 => 'LaravelLang\\StarterKits\\Plugins\\Livewire',
        1 => 'LaravelLang\\StarterKits\\Plugins\\React',
        2 => 'LaravelLang\\StarterKits\\Plugins\\Vue',
      ),
    ),
    'packages' => 
    array (
      'C:\\dev\\doctor-appointment-app-4b\\vendor\\laravel-lang\\actions' => 
      array (
        'class' => 'LaravelLang\\Actions\\Plugin',
        'name' => 'laravel-lang/actions',
      ),
      'C:\\dev\\doctor-appointment-app-4b\\vendor\\laravel-lang\\attributes' => 
      array (
        'class' => 'LaravelLang\\Attributes\\Plugin',
        'name' => 'laravel-lang/attributes',
      ),
      'C:\\dev\\doctor-appointment-app-4b\\vendor\\laravel-lang\\http-statuses' => 
      array (
        'class' => 'LaravelLang\\HttpStatuses\\Plugin',
        'name' => 'laravel-lang/http-statuses',
      ),
      'C:\\dev\\doctor-appointment-app-4b\\vendor\\laravel-lang\\lang' => 
      array (
        'class' => 'LaravelLang\\Lang\\Plugin',
        'name' => 'laravel-lang/lang',
      ),
      'C:\\dev\\doctor-appointment-app-4b\\vendor\\laravel-lang\\moonshine' => 
      array (
        'class' => 'LaravelLang\\MoonShine\\Plugin',
        'name' => 'moonshine/moonshine',
      ),
      'C:\\dev\\doctor-appointment-app-4b\\vendor\\laravel-lang\\starter-kits' => 
      array (
        'class' => 'LaravelLang\\StarterKits\\Plugin',
        'name' => 'laravel-lang/starter-kits',
      ),
    ),
    'models' => 
    array (
      'directory' => 'C:\\dev\\doctor-appointment-app-4b\\app',
    ),
    'map' => 
    array (
      'af' => 
      array (
        'type' => 'Latn',
        'regional' => 'af_ZA',
      ),
      'sq' => 
      array (
        'type' => 'Latn',
        'regional' => 'sq_AL',
      ),
      'am' => 
      array (
        'type' => 'Ethi',
        'regional' => 'am_ET',
      ),
      'ar' => 
      array (
        'type' => 'Arab',
        'regional' => 'ar_AE',
        'direction' => 
        \LaravelLang\LocaleList\Direction::RightToLeft,
      ),
      'hy' => 
      array (
        'type' => 'Armn',
        'regional' => 'hy_AM',
      ),
      'as' => 
      array (
        'type' => 'Beng',
        'regional' => 'as_IN',
      ),
      'az' => 
      array (
        'type' => 'Latn',
        'regional' => 'az_AZ',
      ),
      'bm' => 
      array (
        'type' => 'Latn',
        'regional' => 'bm_ML',
      ),
      'bho' => 
      array (
        'type' => 'Deva',
        'regional' => 'bho_IN',
      ),
      'eu' => 
      array (
        'type' => 'Latn',
        'regional' => 'eu_ES',
      ),
      'be' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'be_BY',
      ),
      'bn' => 
      array (
        'type' => 'Beng',
        'regional' => 'bn_BD',
      ),
      'bs' => 
      array (
        'type' => 'Latn',
        'regional' => 'bs_BA',
      ),
      'bg' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'bg_BG',
      ),
      'en_CA' => 
      array (
        'type' => 'Latn',
        'regional' => 'en_CA',
      ),
      'ca' => 
      array (
        'type' => 'Latn',
        'regional' => 'ca_ES',
      ),
      'ceb' => 
      array (
        'type' => 'Latn',
        'regional' => 'ceb_PH',
      ),
      'km' => 
      array (
        'type' => 'Khmr',
        'regional' => 'km_KH',
      ),
      'zh_CN' => 
      array (
        'type' => 'Hans',
        'regional' => 'zh_CN',
      ),
      'zh_HK' => 
      array (
        'type' => 'Hans',
        'regional' => 'zh_HK',
      ),
      'zh_TW' => 
      array (
        'type' => 'Hans',
        'regional' => 'zh_TW',
      ),
      'hr' => 
      array (
        'type' => 'Latn',
        'regional' => 'hr_HR',
      ),
      'cs' => 
      array (
        'type' => 'Latn',
        'regional' => 'cs_CZ',
      ),
      'da' => 
      array (
        'type' => 'Latn',
        'regional' => 'da_DK',
      ),
      'doi' => 
      array (
        'type' => 'Deva',
        'regional' => 'doi_IN',
      ),
      'nl' => 
      array (
        'type' => 'Latn',
        'regional' => 'nl_NL',
      ),
      'en' => 
      array (
        'type' => 'Latn',
        'regional' => 'en_GB',
      ),
      'eo' => 
      array (
        'type' => 'Latn',
        'regional' => 'eo_001',
      ),
      'et' => 
      array (
        'type' => 'Latn',
        'regional' => 'et_EE',
      ),
      'ee' => 
      array (
        'type' => 'Latn',
        'regional' => 'ee_GH',
      ),
      'fi' => 
      array (
        'type' => 'Latn',
        'regional' => 'fi_FI',
      ),
      'fr' => 
      array (
        'type' => 'Latn',
        'regional' => 'fr_FR',
      ),
      'fy' => 
      array (
        'type' => 'Latn',
        'regional' => 'fy_NL',
      ),
      'gl' => 
      array (
        'type' => 'Latn',
        'regional' => 'gl_ES',
      ),
      'ka' => 
      array (
        'type' => 'Geor',
        'regional' => 'ka_GE',
      ),
      'de' => 
      array (
        'type' => 'Latn',
        'regional' => 'de_DE',
      ),
      'de_CH' => 
      array (
        'type' => 'Latn',
        'regional' => 'de_CH',
      ),
      'el' => 
      array (
        'type' => 'Grek',
        'regional' => 'el_GR',
      ),
      'gu' => 
      array (
        'type' => 'Gujr',
        'regional' => 'gu_IN',
      ),
      'ha' => 
      array (
        'type' => 'Latn',
        'regional' => 'ha_NG',
      ),
      'haw' => 
      array (
        'type' => 'Latn',
        'regional' => 'haw',
      ),
      'he' => 
      array (
        'type' => 'Hebr',
        'regional' => 'he_IL',
        'direction' => 
        \LaravelLang\LocaleList\Direction::RightToLeft,
      ),
      'hi' => 
      array (
        'type' => 'Deva',
        'regional' => 'hi_IN',
      ),
      'hu' => 
      array (
        'type' => 'Latn',
        'regional' => 'hu_HU',
      ),
      'is' => 
      array (
        'type' => 'Latn',
        'regional' => 'is_IS',
      ),
      'ig' => 
      array (
        'type' => 'Latn',
        'regional' => 'ig_NG',
      ),
      'id' => 
      array (
        'type' => 'Latn',
        'regional' => 'id_ID',
      ),
      'ga' => 
      array (
        'type' => 'Latn',
        'regional' => 'ga_IE',
      ),
      'it' => 
      array (
        'type' => 'Latn',
        'regional' => 'it_IT',
      ),
      'ja' => 
      array (
        'type' => 'Jpan',
        'regional' => 'ja_JP',
      ),
      'kn' => 
      array (
        'type' => 'Knda',
        'regional' => 'kn_IN',
      ),
      'kk' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'kk_KZ',
      ),
      'rw' => 
      array (
        'type' => 'Latn',
        'regional' => 'rw_RW',
      ),
      'ko' => 
      array (
        'type' => 'Hang',
        'regional' => 'ko_KR',
      ),
      'ku' => 
      array (
        'type' => 'Latn',
        'regional' => 'ku_TR',
      ),
      'ckb' => 
      array (
        'type' => 'Arab',
        'regional' => 'ckb_IQ',
        'direction' => 
        \LaravelLang\LocaleList\Direction::RightToLeft,
      ),
      'ky' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'ky_KG',
      ),
      'lo' => 
      array (
        'type' => 'Laoo',
        'regional' => 'lo_LA',
      ),
      'lv' => 
      array (
        'type' => 'Latn',
        'regional' => 'lv_LV',
      ),
      'ln' => 
      array (
        'type' => 'Latn',
        'regional' => 'ln_CD',
      ),
      'lt' => 
      array (
        'type' => 'Latn',
        'regional' => 'lt_LT',
      ),
      'lg' => 
      array (
        'type' => 'Latn',
        'regional' => 'lg_UG',
      ),
      'lb' => 
      array (
        'type' => 'Latn',
        'regional' => 'lb_LU',
      ),
      'mk' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'mk_MK',
      ),
      'mai' => 
      array (
        'type' => 'Deva',
        'regional' => 'mai_IN',
      ),
      'mg' => 
      array (
        'type' => 'Latn',
        'regional' => 'mg_MG',
      ),
      'ml' => 
      array (
        'type' => 'Mlym',
        'regional' => 'ml_IN',
      ),
      'ms' => 
      array (
        'type' => 'Latn',
        'regional' => 'ms_MY',
      ),
      'mt' => 
      array (
        'type' => 'Latn',
        'regional' => 'mt_MT',
      ),
      'mr' => 
      array (
        'type' => 'Deva',
        'regional' => 'mr_IN',
      ),
      'mi' => 
      array (
        'type' => 'Latn',
        'regional' => 'mi_NZ',
      ),
      'mni_Mtei' => 
      array (
        'type' => 'Beng',
        'regional' => 'mni_IN',
      ),
      'mn' => 
      array (
        'type' => 'Mong',
        'regional' => 'mn_MN',
      ),
      'my' => 
      array (
        'type' => 'Mymr',
        'regional' => 'my_MM',
      ),
      'ne' => 
      array (
        'type' => 'Deva',
        'regional' => 'ne',
      ),
      'nb' => 
      array (
        'type' => 'Latn',
        'regional' => 'nb_NO',
      ),
      'nn' => 
      array (
        'type' => 'Latn',
        'regional' => 'nn_NO',
      ),
      'oc' => 
      array (
        'type' => 'Latn',
        'regional' => 'oc_FR',
      ),
      'or' => 
      array (
        'type' => 'Orya',
        'regional' => 'or_IN',
      ),
      'om' => 
      array (
        'type' => 'Latn',
        'regional' => 'om_ET',
      ),
      'ps' => 
      array (
        'type' => 'Arab',
        'regional' => 'ps_AF',
        'direction' => 
        \LaravelLang\LocaleList\Direction::RightToLeft,
      ),
      'fa' => 
      array (
        'type' => 'Arab',
        'regional' => 'fa_IR',
        'direction' => 
        \LaravelLang\LocaleList\Direction::RightToLeft,
      ),
      'fil' => 
      array (
        'type' => 'Latn',
        'regional' => 'fil_PH',
      ),
      'pl' => 
      array (
        'type' => 'Latn',
        'regional' => 'pl_PL',
      ),
      'pt' => 
      array (
        'type' => 'Latn',
        'regional' => 'pt_PT',
      ),
      'pt_BR' => 
      array (
        'type' => 'Latn',
        'regional' => 'pt_BR',
      ),
      'pa' => 
      array (
        'type' => 'Guru',
        'regional' => 'pa_IN',
      ),
      'qu' => 
      array (
        'type' => 'Latn',
        'regional' => 'qu_PE',
      ),
      'ro' => 
      array (
        'type' => 'Latn',
        'regional' => 'ro_RO',
      ),
      'ru' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'ru_RU',
      ),
      'sa' => 
      array (
        'type' => 'Deva',
        'regional' => 'sa_IN',
      ),
      'sc' => 
      array (
        'type' => 'Latn',
        'regional' => 'sc_IT',
      ),
      'gd' => 
      array (
        'type' => 'Latn',
        'regional' => 'gd_GB',
      ),
      'sr_Cyrl' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'sr_RS',
      ),
      'sr_Latn' => 
      array (
        'type' => 'Latn',
        'regional' => 'sr_RS',
      ),
      'sr_Latn_ME' => 
      array (
        'type' => 'Latn',
        'regional' => 'sr_Latn_ME',
      ),
      'sn' => 
      array (
        'type' => 'Latn',
        'regional' => 'sn_ZW',
      ),
      'sd' => 
      array (
        'type' => 'Arab',
        'regional' => 'sd_PK',
        'direction' => 
        \LaravelLang\LocaleList\Direction::RightToLeft,
      ),
      'si' => 
      array (
        'type' => 'Sinh',
        'regional' => 'si_LK',
      ),
      'sk' => 
      array (
        'type' => 'Latn',
        'regional' => 'sk_SK',
      ),
      'sl' => 
      array (
        'type' => 'Latn',
        'regional' => 'sl_SI',
      ),
      'so' => 
      array (
        'type' => 'Latn',
        'regional' => 'so_SO',
      ),
      'es' => 
      array (
        'type' => 'Latn',
        'regional' => 'es_ES',
      ),
      'su' => 
      array (
        'type' => 'Latn',
        'regional' => 'su_ID',
      ),
      'sw' => 
      array (
        'type' => 'Latn',
        'regional' => 'sw_KE',
      ),
      'sv' => 
      array (
        'type' => 'Latn',
        'regional' => 'sv_SE',
      ),
      'tl' => 
      array (
        'type' => 'Latn',
        'regional' => 'tl_PH',
      ),
      'tg' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'tg_TJ',
      ),
      'ta' => 
      array (
        'type' => 'Taml',
        'regional' => 'ta_IN',
      ),
      'tt' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'tt_RU',
      ),
      'te' => 
      array (
        'type' => 'Telu',
        'regional' => 'te_IN',
      ),
      'ti' => 
      array (
        'type' => 'Ethi',
        'regional' => 'ti_ET',
      ),
      'th' => 
      array (
        'type' => 'Thai',
        'regional' => 'th_TH',
      ),
      'tr' => 
      array (
        'type' => 'Latn',
        'regional' => 'tr_TR',
      ),
      'tk' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'tk_TM',
      ),
      'ak' => 
      array (
        'type' => 'Latn',
        'regional' => 'ak_GH',
      ),
      'ug' => 
      array (
        'type' => 'Arab',
        'regional' => 'ug_CN',
        'direction' => 
        \LaravelLang\LocaleList\Direction::RightToLeft,
      ),
      'uk' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'uk_UA',
      ),
      'ur' => 
      array (
        'type' => 'Arab',
        'regional' => 'ur_PK',
        'direction' => 
        \LaravelLang\LocaleList\Direction::RightToLeft,
      ),
      'uz_Cyrl' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'uz_UZ',
      ),
      'uz_Latn' => 
      array (
        'type' => 'Latn',
        'regional' => 'uz_UZ',
      ),
      'vi' => 
      array (
        'type' => 'Latn',
        'regional' => 'vi_VN',
      ),
      'cy' => 
      array (
        'type' => 'Latn',
        'regional' => 'cy_GB',
      ),
      'xh' => 
      array (
        'type' => 'Latn',
        'regional' => 'xh_ZA',
      ),
      'yi' => 
      array (
        'type' => 'Hebr',
        'regional' => 'yi_001',
      ),
      'yo' => 
      array (
        'type' => 'Latn',
        'regional' => 'yo_NG',
      ),
      'zu' => 
      array (
        'type' => 'Latn',
        'regional' => 'zu_ZA',
      ),
    ),
  ),
  'localization' => 
  array (
    'inline' => false,
    'align' => true,
    'aliases' => 
    array (
    ),
    'smart_punctuation' => 
    array (
      'enable' => false,
      'common' => 
      array (
        'double_quote_opener' => '“',
        'double_quote_closer' => '”',
        'single_quote_opener' => '‘',
        'single_quote_closer' => '’',
      ),
      'locales' => 
      array (
        'fr' => 
        array (
          'double_quote_opener' => '«&nbsp;',
          'double_quote_closer' => '&nbsp;»',
          'single_quote_opener' => '‘',
          'single_quote_closer' => '’',
        ),
        'ru' => 
        array (
          'double_quote_opener' => '«',
          'double_quote_closer' => '»',
          'single_quote_opener' => '‘',
          'single_quote_closer' => '’',
        ),
        'uk' => 
        array (
          'double_quote_opener' => '«',
          'double_quote_closer' => '»',
          'single_quote_opener' => '‘',
          'single_quote_closer' => '’',
        ),
        'be' => 
        array (
          'double_quote_opener' => '«',
          'double_quote_closer' => '»',
          'single_quote_opener' => '‘',
          'single_quote_closer' => '’',
        ),
      ),
    ),
    'routes' => 
    array (
      'names' => 
      array (
        'parameter' => 'locale',
        'header' => 'Accept-Language',
        'cookie' => 'Accept-Language',
        'session' => 'Accept-Language',
        'column' => 'locale',
      ),
      'name_prefix' => 'localized.',
      'redirect_default' => false,
      'hide_default' => false,
      'group' => 
      array (
        'middlewares' => 
        array (
          'default' => 
          array (
            0 => 'LaravelLang\\Routes\\Middlewares\\LocalizationByCookie',
            1 => 'LaravelLang\\Routes\\Middlewares\\LocalizationByHeader',
            2 => 'LaravelLang\\Routes\\Middlewares\\LocalizationBySession',
            3 => 'LaravelLang\\Routes\\Middlewares\\LocalizationByModel',
          ),
          'prefix' => 
          array (
            0 => 'LaravelLang\\Routes\\Middlewares\\LocalizationByParameterPrefix',
            1 => 'LaravelLang\\Routes\\Middlewares\\LocalizationByCookie',
            2 => 'LaravelLang\\Routes\\Middlewares\\LocalizationByHeader',
            3 => 'LaravelLang\\Routes\\Middlewares\\LocalizationBySession',
            4 => 'LaravelLang\\Routes\\Middlewares\\LocalizationByModel',
          ),
        ),
      ),
    ),
    'models' => 
    array (
      'suffix' => 'Translation',
      'filter' => 
      array (
        'enabled' => true,
      ),
      'helpers' => 'C:\\dev\\doctor-appointment-app-4b\\vendor/_laravel_lang',
    ),
    'translators' => 
    array (
      'channels' => 
      array (
        'google' => 
        array (
          'translator' => '\\LaravelLang\\Translator\\Integrations\\Google',
          'enabled' => true,
          'priority' => 1,
        ),
        'deepl' => 
        array (
          'translator' => '\\LaravelLang\\Translator\\Integrations\\Deepl',
          'enabled' => false,
          'priority' => 2,
          'credentials' => 
          array (
            'key' => '',
          ),
        ),
        'yandex' => 
        array (
          'translator' => '\\LaravelLang\\Translator\\Integrations\\Yandex',
          'enabled' => false,
          'priority' => 3,
          'credentials' => 
          array (
            'key' => '',
            'folder' => '',
          ),
        ),
      ),
      'options' => 
      array (
        'preserve_parameters' => true,
      ),
    ),
  ),
  'livewire' => 
  array (
    'class_namespace' => 'App\\Livewire',
    'view_path' => 'C:\\dev\\doctor-appointment-app-4b\\resources\\views/livewire',
    'layout' => 'components.layouts.app',
    'lazy_placeholder' => NULL,
    'temporary_file_upload' => 
    array (
      'disk' => NULL,
      'rules' => NULL,
      'directory' => NULL,
      'middleware' => NULL,
      'preview_mimes' => 
      array (
        0 => 'png',
        1 => 'gif',
        2 => 'bmp',
        3 => 'svg',
        4 => 'wav',
        5 => 'mp4',
        6 => 'mov',
        7 => 'avi',
        8 => 'wmv',
        9 => 'mp3',
        10 => 'm4a',
        11 => 'jpg',
        12 => 'jpeg',
        13 => 'mpga',
        14 => 'webp',
        15 => 'wma',
      ),
      'max_upload_time' => 5,
      'cleanup' => true,
    ),
    'render_on_redirect' => false,
    'legacy_model_binding' => false,
    'inject_assets' => true,
    'navigate' => 
    array (
      'show_progress_bar' => true,
      'progress_bar_color' => '#2299dd',
    ),
    'inject_morph_markers' => true,
    'pagination_theme' => 'tailwind',
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'alias' => 
    array (
    ),
    'dont_alias' => 
    array (
      0 => 'App\\Nova',
    ),
  ),
);
