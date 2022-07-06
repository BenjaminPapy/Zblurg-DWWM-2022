<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;

class UsersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Users::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('lastName'),
            TextField::new('firstName'),
            EmailField::new('email'),
            ArrayField::new('roles'),
            TextField::new('password'),
            TextField::new('phoneNumber'),
            TextField::new('planete'),
            TextField::new('area'),
            TextField::new('city'),
            TextField::new('zipCode'),
            DateField::new('createdAt')->hideOnForm()->setFormat('Y-MM-dd HH:mm')->renderAsText(),
            DateField::new('updatedAt')->hideOnForm()->setFormat('Y-MM-dd HH:mm')->renderAsText(),
        ];
    }
}
