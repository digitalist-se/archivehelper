<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link https://matomo.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

use Piwik\ArchiveProcessor\ArchivingStatus;
use Piwik\Container\StaticContainer;
namespace Piwik\Plugins\ArchiveHelper;

use Piwik\ArchiveProcessor\ArchivingStatus;

class ArchiveHelper extends \Piwik\Plugin
{
    public function registerEvents()
    {
        return array(
            'CronArchive.init.start'   => 'archivingIsStarting',
            'CronArchive.init.finish' => 'archivingInitIsDone',
            'CronArchive.end' => 'archivingEnded',
            'CronArchive.filterWebsiteIds' => 'archivingFilterWebsitesIds',
            'CronArchive.getIdSitesNotUsingTracker' => 'archivingGetIdSitesNotUsingTracker',
            'CronArchive.archiveSingleSite.finish' => 'archivingSingleSiteFinish',
            'CronArchive.archiveSingleSite.start' => 'archivingSingleSiteStart'
        );
    }
    public function archivingIsStarting($archive) {
        if (empty($archive->shouldArchiveSpecifiedSites)) {
            $this->single($archive);
        }
        else {
            $this->multi($archive);
        }
    }
    private function single($archive) {
        var_dump('all');
    }



    private function multi($archive) {
        //var_dump($archive);
        var_dump('single!');
    }

    public function archivingInitIsDone($archive) {
        // this only returns site id, do not know yet if this is useful.
    }

    public function archivingEnded($archive) {
        var_dump('archivingEnded');
    }

    public function archivingFilterWebsitesIds($archive) {
        // add sites to filter, not useful for us yet, maybe never.
    }

    public function archivingGetIdSitesNotUsingTracker($archive) {
        // do not know if this could be used. we will see.
    }

    public function archivingSingleSiteStart($archive) {
        // just return bool if single
    }

    public function archivingSingleSiteFinish($archive) {
        // just true or false.
    }


    /*
     * Then starting create log archive_site_ids_date [ex. archive_site_1_2_4_10_date]
     * tabell - id, active, timestamp_start, timestamp_end
     *
     *
     */
}
