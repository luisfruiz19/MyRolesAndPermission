
<?php
Route::get('/test', function () {


/*  return Role::create([
'name' => 'Admin',
'slug' => 'admin',
'description' => 'Administrator',
'full-access' => 'yes'
]); */

/*  return Role::create([
    'name' => 'Guest',
    'slug' => 'guest',
    'description' => 'guest',
    'full-access' => 'no'
    ]); */

  return Role::create([
        'name' => 'Test',
        'slug' => 'test',
        'description' => 'test',
        'full-access' => 'no'
        ]);



});
