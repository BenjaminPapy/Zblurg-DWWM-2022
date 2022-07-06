<?php

namespace App\Controller\Admin;

use App\Entity\Brand;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class BrandCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Brand::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('name'),
            SlugField::new('slug')->setTargetFieldName('name')->hideOnIndex(),
            TextField::new('logoFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
            ImageField::new('logo')->setBasePath('/images/brand-logo/')->onlyOnIndex(),
            DateField::new('createdAt')->hideOnForm()->setFormat('Y-MM-dd HH:mm')->renderAsText(),
            DateField::new('updatedAt')->hideOnForm()->setFormat('Y-MM-dd HH:mm')->renderAsText(),
        ];
    }
}
