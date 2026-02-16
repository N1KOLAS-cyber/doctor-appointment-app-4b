<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class ServeCommand extends Command
{
    protected $signature = 'serve {--host=127.0.0.1} {--port=8000}';
    protected $description = 'Serve the application on the PHP development server';

    public function handle()
    {
        $host = $this->option('host');
        $port = $this->option('port');
        
        $this->components->info("Server running on [http://{$host}:{$port}].");
        $this->comment('Press Ctrl+C to stop the server');
        $this->newLine();

        $process = new Process([
            PHP_BINARY,
            '-S',
            "{$host}:{$port}",
            '-t',
            'public'
        ], base_path());

        $process->setTimeout(null);
        $process->run(function ($type, $buffer) {
            $this->output->write($buffer);
        });

        return $process->getExitCode();
    }
}
