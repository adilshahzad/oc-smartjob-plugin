<?php

return [
    'plugin' => [
        'name' => 'Smart Job',
        'description' => 'A robust system for the Job posting.'
    ],
    'joblisting' => [
        'name' => 'Jobs',
        'description' => 'Manage Jobs',
        'jobs_per_page' => 'Jobs per page',
        'jobs_per_page_validation' => 'Invalid format of the jobs per page value'
    ],
    'myjoblisting' => [
        'name' => 'User Jobs',
        'description' => 'Manage user jobs',
        'jobs_per_page' => 'Jobs per page',
        'jobs_per_page_validation' => 'Invalid format of the jobs per page value'
    ],    
    'job' => [
        'users' => 'Candidates',
        'title' => 'Title',
        'title_placeholder' => 'New job title',
        'slug' => 'Slug',
        'location' => 'Job location',
        'job_type' => 'Job type',
        'department' => 'Department',         
        'description' => 'Description',
        'application_email' => 'Application email',
        'job_expiry' => 'Expiry Date',
        'min_salary' => 'Min. Salary',
        'max_salary' => 'Max. Salary',
        'qualification' => 'Qualification',
        'experience' => 'Experience',
        'gender' => 'Gender',
        'total_number_of_post' => 'No.of post',
        'is_filled' => 'Position filled?',
        'job_status' => 'Job Status',
        'is_expired' => 'Job Status (Active, Expired)',
        'filled_selected' => 'Mark the selected as Filled',
        'vacant_selected' => 'Mark the selected as Vacant',
        'expire_selected' => 'Mark the selected as Expired?',
        'active_selected' => 'Mark the selected as Available?',
        'filled_selected_confirm' => 'Are you sure to mark selected job as Filled?',
        'vacant_selected_confirm' => 'Are you sure to mark selected job as Vacant?',
        'active_selected_confirm' => 'Are you sure to mark selected job as Active?',
        'expire_selected_confirm' => 'Are you sure to mark selected job as Expire?',
        'filled_selected_success' => 'Successfully job filled!',
        'vacant_selected_success' => 'Successfully job vacant!',
        'activate_selected_success' => 'Job activated successfully!',
        'expire_selected_success' => 'Successfully job expired.',
        'created_at' => 'Created at',
        'bulk_actions' => 'Delete selected',
        'delete_selected_confirm' => ' Are you sure to delete job?',
        'delete_selected' => 'Delete selected job?',
        'delete_selected_success' => 'Successfully deleted the selected jobs.',
        'delete_selected_empty' => 'There are no selected jobs to delete.',
        'deactivate_selected_empty' => 'There are no selected jobs to deactivate.',
        'restore_selected_empty' => 'There are no selected jobs to restore.',
        'ban_selected_empty' => 'There are no selected jobs to ban.',
        'unban_selected_empty' => 'There are no selected jobs to unban.',        
    ],
    'department' => [
        'department_name' => 'Department',
    ],
    'jobdetail' => [
        'component_name' => 'JobDetail',
        'component_detail' => 'Detail view of the job',
        'description' => 'Description',        
        'job_slug' => 'Slug',
        'job_slug_description' => 'Provide job slug',
        'job_id' => 'Job ID',
        'job_id_description' => 'Provide job id',
    ],
    'roster_roles' => [
        'manage' => 'Manage Roles',
        'roles' => 'Roster Roles',
        'title' => 'Roster Title',
        'created_at' => 'Created at',
    ],
    'roster_sub_roles' => [
        'title' => 'Roster Sub Role Title',
        'created_at' => 'Created at',
    ],    
];
