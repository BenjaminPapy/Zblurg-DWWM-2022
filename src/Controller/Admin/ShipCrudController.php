<?php

namespace App\Controller\Admin;

use App\Entity\Ship;
use App\Form\ImagesType;
use App\Form\ShipImagesType;
use App\Form\ShipImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ShipCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ship::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('name'),
            BooleanField::new('premium'),
            NumberField::new('price'),
            AssociationField::new('brand'),
            AssociationField::new('size'),
            AssociationField::new('type'),
            TextField::new('description'),
            NumberField::new('length'),
            NumberField::new('beam'),
            NumberField::new('height'),
            NumberField::new('mass'),
            NumberField::new('cargoCap'),
            NumberField::new('scmSpeed'),
            NumberField::new('afterburnSpeed'),
            IntegerField::new('minCrew'),
            IntegerField::new('maxCrew'),
            TextField::new('shipViewFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
            ImageField::new('shipView')->setBasePath('/images/ship-view')->onlyOnIndex(),
            CollectionField::new('ship_images')
            ->setEntryType(ShipImagesType::class)
            ->setFormTypeOption('by_reference', false)
            ->onlyOnForms(),
            CollectionField::new('ship_images')
            ->setTemplatePath('admin/ship/image_crud_render.html.twig')
            ->onlyOnDetail(),
            SlugField::new('slug')->setTargetFieldName('name')->hideOnIndex(),
            DateField::new('createdAt')->hideOnForm()->setFormat('Y-MM-dd HH:mm')->renderAsText(),
            DateField::new('updatedAt')->hideOnForm()->setFormat('Y-MM-dd HH:mm')->renderAsText(),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDefaultSort(['createdAt' => 'DESC']);
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(CRUD::PAGE_INDEX, 'detail');
    }
}
