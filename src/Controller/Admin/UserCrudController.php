<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('utilisateurs')
            ->setEntityLabelInSingular('utilisateur')
            ->setPageTitle("index", "Afficher les utilisateurs")
            ->setPageTitle("new", "Vous ne pouvez pas créer d'utilisateur par le tableau d'administration")
            ->setPageTitle("edit", "Vous ne pouvez pas modifier d'utilisateur par le tableau d'administration");
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            EmailField::new('email', 'Adresse mail')
                ->hideOnForm(),
            TextField::new('password', 'Mot de passe')
                ->hideOnIndex()->hideOnDetail()->hideOnForm(),
            ArrayField::new('roles', 'Roles')
                ->hideOnForm(),
        ];
    }

}
