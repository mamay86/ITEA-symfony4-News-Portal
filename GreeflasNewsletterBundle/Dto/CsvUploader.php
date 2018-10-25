<?php
/**
 * Created by PhpStorm.
 * User: roma
 * Date: 25.10.18
 * Time: 15:33
 */

namespace Greeflas\Bundle\NewsletterBundle\Dto;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class CsvUploader implements ContainerAwareInterface
{
    use ContainerAwareTrait;
    const FILE_FOR_SUBSCRIBERS = '../var/file_storage/subscribers.csv';
    private $list = array();
    private $email;
    private $file_to_load;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function getList(): void
    {
        $rowNo = 1;
        if (($fp = fopen(self::FILE_FOR_SUBSCRIBERS, "r")) !== FALSE) {
            while (($row = fgetcsv($fp, 1000, ",")) !== FALSE) {
                $num = count($row);
                $rowNo++;
                for ($c=0; $c < $num; $c++) {
                    if (!is_null($row[$c])) $this->list[] = array($row[$c]);
                }
            }
            fclose($fp);
        }
    }

    public function updateSubsribers(): void
    {
        $this->getList();

        $this->list[] = array($this->email);

        $fp = fopen(self::FILE_FOR_SUBSCRIBERS, "w");
        foreach ($this->list as $line)
        {
            fputcsv($fp, $line,',');
        }
        fclose($fp);
    }

    public function setFileToLoad($file_to_load): void
    {
        $this->file_to_load = $file_to_load;
    }
}