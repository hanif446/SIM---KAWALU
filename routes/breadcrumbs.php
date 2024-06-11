<?php // routes/breadcrumbs.php
// Dashboard
Breadcrumbs::for('dashboard', function ( $trail) {
    $trail->push('Dashboard', route('dashboard.index'));
});

// Dashboard >  Home
Breadcrumbs::for('dashboard_home', function ( $trail) {
    $trail->parent('dashboard');
    $trail->push('Home', '#');
});

// Dashboard > Jabatan
Breadcrumbs::for('dashboard_jabatan', function ( $trail) {
    $trail->parent('dashboard');
    $trail->push('Jabatan', route('jabatan.index'));
});

// Dashboard > Jabatan > Tambah Jabatan
Breadcrumbs::for('dashboard_jabatan_create', function ( $trail) {
    $trail->parent('dashboard_jabatan');
    $trail->push('Tambah Jabatan', route('jabatan.create'));
});

// Dashboard > Jabatan > Edit Jabatan 
Breadcrumbs::for('dashboard_jabatan_edit', function ( $trail, $jabatan) {
    $trail->parent('dashboard_jabatan');
    $trail->push('Edit Jabatan', route('jabatan.edit', ['jabatan' => $jabatan]));
});

// Dashboard > Golongan Gaji
Breadcrumbs::for('dashboard_golongan_gaji', function ( $trail) {
    $trail->parent('dashboard');
    $trail->push('Pangkat/Golongan', route('golongan-gaji.index'));
});

// Dashboard > Golongan Gaji > Tambah Golongan Gaji
Breadcrumbs::for('dashboard_golongan_gaji_create', function ( $trail) {
    $trail->parent('dashboard_golongan_gaji');
    $trail->push('Tambah Pangkat/Golongan', route('golongan-gaji.create'));
});

// Dashboard > Golongan Gaji > Edit Golongan Gaji 
Breadcrumbs::for('dashboard_golongan_gaji_edit', function ( $trail, $golongan_gaji) {
    $trail->parent('dashboard_golongan_gaji');
    $trail->push('Edit Pangkat/Golongan', route('golongan-gaji.edit', ['golongan_gaji' => $golongan_gaji]));
});

// Dashboard > Pegawai
Breadcrumbs::for('dashboard_pegawai', function ( $trail) {
    $trail->parent('dashboard');
    $trail->push('Pegawai', route('pegawai.index'));
});

// Dashboard > Pegawai > Tambah Pegawai
Breadcrumbs::for('dashboard_pegawai_create', function ( $trail) {
    $trail->parent('dashboard_pegawai');
    $trail->push('Tambah Pegawai', route('pegawai.create'));
});

// Dashboard > Pegawai > Edit Pegawai
Breadcrumbs::for('dashboard_pegawai_edit', function ( $trail, $pegawai) {
    $trail->parent('dashboard_pegawai');
    $trail->push('Edit', route('pegawai.edit', ['pegawai' => $pegawai]));
    $trail->push($pegawai->nama_pegawai, route('pegawai.edit',['pegawai' => $pegawai]));
});

// Dashboard > Pegawai > Detail Pegawai
Breadcrumbs::for('dashboard_pegawai_detail', function ( $trail, $pegawai) {
    $trail->parent('dashboard_pegawai');
    $trail->push('Detail', route('pegawai.show', ['pegawai' => $pegawai]));
    $trail->push($pegawai->nama_pegawai, route('pegawai.show',['pegawai' => $pegawai]));
});

// Dashboard > Roles
Breadcrumbs::for('dashboard_roles', function ( $trail) {
    $trail->parent('dashboard');
    $trail->push('Roles', route('roles.index'));
});

// Dashboard > Add > Roles
Breadcrumbs::for('dashboard_roles_create', function ( $trail) {
    $trail->parent('dashboard_roles');
    $trail->push('Tambah Roles', route('roles.create'));
});

// Dashboard > Roles > Detail > [Title]
Breadcrumbs::for('dashboard_roles_detail', function ( $trail, $role) {
    $trail->parent('dashboard_roles');
    $trail->push('Detail', route('roles.show',['role' => $role]));
    $trail->push($role->name, route('roles.show',['role' => $role]));
});

// Dashboard > Roles > Edit > [Title]
Breadcrumbs::for('dashboard_roles_edit', function ( $trail, $role) {
    $trail->parent('dashboard_roles');
    $trail->push('Edit', route('roles.edit',['role' => $role]));
    $trail->push($role->name, route('roles.edit',['role' => $role]));
});

// Dashboard > Users
Breadcrumbs::for('dashboard_users', function ( $trail) {
    $trail->parent('dashboard');
    $trail->push('Users', route('user.index'));
});

// Dashboard > Add > Users
Breadcrumbs::for('dashboard_users_create', function ( $trail) {
    $trail->parent('dashboard_users');
    $trail->push('Tambah Users', route('user.create'));
});

// Dashboard > Users > Edit > [Title]
Breadcrumbs::for('dashboard_users_edit', function ( $trail, $user) {
    $trail->parent('dashboard_users');
    $trail->push('Edit', route('user.edit',['user' => $user]));
    $trail->push($user->username, route('user.edit',['user' => $user]));
});

// Dashboard > Change Password
Breadcrumbs::for('dashboard_change_password', function ( $trail) {
    $trail->parent('dashboard');
    $trail->push('Change Password', route('user.change_password'));
});

// Dashboard > Gaji Pokok
Breadcrumbs::for('dashboard_gaji_pokok', function ( $trail) {
    $trail->parent('dashboard');
    $trail->push('Gaji Pegawai', route('gaji-pokok.index'));
});

// Dashboard > Gaji Pokok > Tambah Gaji Pokok Pegawai
Breadcrumbs::for('dashboard_gaji_pokok_create', function ( $trail) {
    $trail->parent('dashboard_gaji_pokok');
    $trail->push('Tambah Gaji Pegawai', route('gaji-pokok.create'));
});

// Dashboard > Gaji Pokok > Edit Gaji Pokok Pegawai
Breadcrumbs::for('dashboard_gaji_pokok_edit', function ( $trail, $gaji_pokok) {
    $trail->parent('dashboard_gaji_pokok');
    $trail->push('Edit Gaji Pegawai', route('gaji-pokok.edit', ['gaji_pokok' => $gaji_pokok]));
});

// Dashboard > Gaji Pokok > Detail Gaji Pokok Pegawai
Breadcrumbs::for('dashboard_gaji_pokok_detail', function ( $trail, $gaji_pokok) {
    $trail->parent('dashboard_gaji_pokok');
    $trail->push('Detail Gaji Pegawai', route('gaji-pokok.show', ['gaji_pokok' => $gaji_pokok]));
});

// Dashboard > Gaji TTP
Breadcrumbs::for('dashboard_gaji_ttp', function ( $trail) {
    $trail->parent('dashboard');
    $trail->push('TPP Pegawai', route('gaji-ttp.index'));
});

// Dashboard > Gaji TTP > Tambah Gaji TTP Pegawai
Breadcrumbs::for('dashboard_gaji_ttp_create', function ( $trail) {
    $trail->parent('dashboard_gaji_ttp');
    $trail->push('Tambah TPP Pegawai', route('gaji-ttp.create'));
});

// Dashboard > Gaji TTP > Edit Gaji TTP Pegawai
Breadcrumbs::for('dashboard_gaji_ttp_edit', function ( $trail, $gaji_ttp) {
    $trail->parent('dashboard_gaji_ttp');
    $trail->push('Edit TPP Pegawai', route('gaji-ttp.edit', ['gaji_ttp' => $gaji_ttp]));
});

// Dashboard > Gaji TTP > Detail Gaji TTP Pegawai
Breadcrumbs::for('dashboard_gaji_ttp_detail', function ( $trail, $gaji_ttp) {
    $trail->parent('dashboard_gaji_ttp');
    $trail->push('Detail TPP Pegawai', route('gaji-ttp.show', ['gaji_ttp' => $gaji_ttp]));
});

// Dashboard > Edit Profil
Breadcrumbs::for('dashboard_edit_profil', function ( $trail, $user) {
    $trail->parent('dashboard');
    $trail->push('Edit Profil', route('user.edit_profil', ['user' => $user]));
});
