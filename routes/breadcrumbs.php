<?php

use App\Models\School;
use App\Models\Supplier;
use App\Models\Teacher;
use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Spatie\Permission\Models\Role;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('dashboard'));
});

// Home > Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Dashboard', route('dashboard'));
});

Breadcrumbs::for('schools.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Schools', route('schools.index'));
});

Breadcrumbs::for('schools.create', function (BreadcrumbTrail $trail) {
    $trail->parent('schools.index');
    $trail->push('Schools Create', route('schools.create'));
});

Breadcrumbs::for('schools.edit', function (BreadcrumbTrail $trail, School $school) {
    $trail->parent('schools.index');
    $trail->push(ucwords($school->name_en), route('schools.edit', $school));
});

Breadcrumbs::for('schools.transportations.index', function (BreadcrumbTrail $trail, School $school) {
    $trail->parent('schools.index');
    $trail->push(ucwords($school->name_en), route('schools.transportations.index', $school->id));
});

Breadcrumbs::for('schools.grades.index', function (BreadcrumbTrail $trail, School $school) {
    $trail->parent('schools.index');
    $trail->push(ucwords($school->name_en), route('schools.grades.index', $school->id));
});

Breadcrumbs::for('schools.news.index', function (BreadcrumbTrail $trail, School $school) {
    $trail->parent('schools.index');
    $trail->push(ucwords($school->name_en), route('schools.news.index', $school->id));
});


/******************************************************* Suppliers ***********************************************/
Breadcrumbs::for('suppliers.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Supplier', route('suppliers.index'));
});
Breadcrumbs::for('suppliers.create', function (BreadcrumbTrail $trail) {
    $trail->parent('suppliers.index');
    $trail->push('Supplier Create', route('suppliers.create'));
});
Breadcrumbs::for('suppliers.edit', function (BreadcrumbTrail $trail, Supplier $supplier) {
    $trail->parent('suppliers.index');
    $trail->push(ucwords($supplier->name_en), route('suppliers.edit', $supplier));
});
/******************************************************* ***********************************************/

/******************************************************* Teachers ***********************************************/
Breadcrumbs::for('teachers.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Teacher', route('teachers.index'));
});
Breadcrumbs::for('teachers.create', function (BreadcrumbTrail $trail) {
    $trail->parent('teachers.index');
    $trail->push('Teachers Create', route('teachers.create'));
});
Breadcrumbs::for('teachers.edit', function (BreadcrumbTrail $trail, Teacher $teacher) {
    $trail->parent('teachers.index');
    $trail->push(ucwords($teacher->full_name_en), route('teachers.edit', $teacher));
});
/******************************************************* ***********************************************/

Breadcrumbs::for('news.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('News', route('news.index'));
});

Breadcrumbs::for('subscriptions.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Subscriptions', route('subscriptions.index'));
});

Breadcrumbs::for('contacts.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Contacts', route('contacts.index'));
});

// Home > Dashboard > User Management
Breadcrumbs::for('user-management.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('User Management', route('user-management.users.index'));
});

// Home > Dashboard > User Management > Users
Breadcrumbs::for('user-management.users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('user-management.index');
    $trail->push('Users', route('user-management.users.index'));
});


// Home > Dashboard > User Management > Users > [User]
Breadcrumbs::for('user-management.users.show', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('user-management.users.index');
    $trail->push(ucwords($user->name), route('user-management.users.show', $user));
});

// Home > Dashboard > User Management > Roles
Breadcrumbs::for('user-management.roles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('user-management.index');
    $trail->push('Roles', route('user-management.roles.index'));
});

// Home > Dashboard > User Management > Roles > [Role]
Breadcrumbs::for('user-management.roles.show', function (BreadcrumbTrail $trail, Role $role) {
    $trail->parent('user-management.roles.index');
    $trail->push(ucwords($role->name), route('user-management.roles.show', $role));
});

// Home > Dashboard > User Management > Permission
Breadcrumbs::for('user-management.permissions.index', function (BreadcrumbTrail $trail) {
    $trail->parent('user-management.index');
    $trail->push('Permissions', route('user-management.permissions.index'));
});


Breadcrumbs::for('vacancies.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Vacancies', route('vacancies.index'));
});
