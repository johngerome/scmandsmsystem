<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Tools extends CI_Controller
{
    public function backup()
    {
        $data['backup_path'] = dirname(BASEPATH) . '/backup/';
        $this->gtemplate->load_view('tools/backup',$data);

    }
    
    public function download_backup()
    {
        $filename = 'database_backup_' . date('Ydm_His') . '.gzip';
        // Load the DB utility class
        $this->load->dbutil();


        $backup = &$this->dbutil->backup();

        // Load the file helper and write the file to your server
        $this->load->helper('file');
        write_file(dirname(BASEPATH) . '/backup/' . $filename, $backup);

        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download($filename, $backup);
        
    }

}
