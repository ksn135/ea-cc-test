<?php

namespace App\Controller;

use App\Entity\Page;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Provider\SessionSelectedColumnStorageProvider;

class PageTheoD02CrudController extends AbstractCrudController
{
    public function __construct(
        private SessionSelectedColumnStorageProvider $sessionSelectedColumnStorageProvider
    ) {}

    public static function getEntityFqcn(): string
    {
        return Page::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Page')
            ->setEntityLabelInPlural('Pages')
            ->setPageTitle('index', 'Pages (TheoD02 example, without configureFields)')
            ->enableColumnChooser()
            ->setColumnChooserSelectedColumnStorageProvider($this->sessionSelectedColumnStorageProvider)
            ->setColumnChooserColumns(
                ['id', 'title'],
                ['content', 'description'],
                ['updatedAt']
            )
        ;
    }

}
