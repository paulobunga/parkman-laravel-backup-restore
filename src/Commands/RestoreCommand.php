<?php

namespace Paulobunga\Parkman\Commands;

use Illuminate\Console\Command;
use Spatie\Backup\Tasks\Restore\RestoreJob;
use Spatie\Backup\BackupDestination\BackupDestinationFactory;

class RestoreCommand extends Command
{
    protected $signature = 'parkman:restore {backup_name? : The name of the backup to restore}';
    protected $description = 'Restore the application from a backup';

    public function handle()
    {
        $this->info('Starting restore...');

        config(['backup.backup' => config('parkman.backup')]);
        config(['filesystems.disks.google' => config('parkman.google')]);

        $diskName = config('backup.backup.destination.disk');
        $backupDestination = BackupDestinationFactory::createFromDiskName($diskName);

        $backupName = $this->argument('backup_name');
        if ($backupName) {
            $backup = $backupDestination->getBackup($backupName);
        } else {
            $backup = $backupDestination->getNewestBackup();
        }

        if (! $backup) {
            $this->error('No backup found.');
            return;
        }

        $restoreJob = new RestoreJob($backup, config('backup.backup.mysql.dump_command_path'));
        $restoreJob->run();

        $this->info('Restore complete!');
    }
}
