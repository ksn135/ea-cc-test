<?php

namespace App\Controller;

use App\Entity\Page;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Provider\SessionSelectedColumnStorageProvider;

class PageKsn135CrudController extends AbstractCrudController
{
    public function __construct(
        private SessionSelectedColumnStorageProvider $sessionSelectedColumnStorageProvider
    ) {}

    public static function getEntityFqcn(): string
    {
        return Page::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm() ,
            TextField::new('title'),
            TextareaField::new('description'),
            TextEditorField::new('content'),
            DateTimeField::new('createdAt'),
            DateTimeField::new('updatedAt'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Page')
            ->setEntityLabelInPlural('Pages')
            ->setPageTitle('index', 'Pages (KSN135 example, with configureFields)')
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
