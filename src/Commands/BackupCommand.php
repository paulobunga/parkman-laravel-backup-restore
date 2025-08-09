<?php

namespace Paulobunga\Parkman\Commands;

use Illuminate\Console\Command;
use Spatie\Backup\Tasks\Backup\BackupJobFactory;

class BackupCommand extends Command
{
    protected $signature = 'parkman:backup';
    protected $description = 'Backup the application';

    public function handle()
    {
        $this->info('Starting backup...');

        config(['backup.backup' => config('parkman.backup')]);
        config(['filesystems.disks.google' => config('parkman.google')]);

        $backupJob = BackupJobFactory::createFromArray(config('backup'));
        $backupJob->run();

        $this->info('Backup complete!');
    }
}
