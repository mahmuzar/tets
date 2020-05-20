<?php

namespace App\Command\Parser;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Doctrine\ORM\EntityManagerInterface;
use App\Command\Parser\ParserInstanceCreater;
use App\Entity\Customers;

class ParserCommand extends Command {

    protected static $defaultName = 'Parser';
    protected $em;

    public function __construct(mixed $name = null, EntityManagerInterface $em) {
        parent::__construct($name);
        $this->em = $em;
    }

    protected function configure() {
        $this
                ->setDescription('Add a short description for your command')
                ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
                ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int {
        //пока не понятно где будут лежать файлы и как будем их получать.
        //это будет костылем,пропишем путь к файлу тут.
        $filePath = __DIR__ . '/../../../data/file.txt';
        
        $parserInstance = ParserInstanceCreater::getInstance($filePath);
        $data = $parserInstance->parse($filePath);

        foreach ($data as $val) {
            if (!empty($val['phone'])) {
                $customer = new Customers();
                $customer->setPhone($val['phone']);
                $customer->setComment($val['comment']);

                $this->em->persist($customer);
                $this->em->flush();
            }
            usleep(500);
        }
        return 0;
    }

}
