<template>
    <div class="appbar">
        <div class="appbar-wrapper hide-scrollbar">
            <div class="d-flex justify-content-center border-bottom w-100">
                <button class="btn btn-secondary btn-icon m-0 btn-minimal btn-sm text-muted d-xl-none" type="button" data-apps-close="">
                    <svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                </button>
            </div>


            <div class="appbar-head">
                <svg class="hw-20" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                <h6 class="mb-0 mt-1">Apps</h6>
            </div>


            <!-- Appbar Nav Start -->
            <ul class="nav nav-minimal appbar-nav" id="appNavTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="notes-tab" data-toggle="tab" href="#notes" role="tab" aria-controls="notes" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>

                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="todo-tab" data-toggle="tab" href="#todo" role="tab" aria-controls="todo" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                        </svg>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="quick-settings-tab" data-toggle="tab" href="#quick-settings" role="tab" aria-controls="quick-settings" aria-selected="false">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </a>
                </li>
            </ul>
            <!-- Appbar Nav End -->
        </div>

        <!-- Tab panes -->
        <div class="tab-content appnavbar-content">
            <div class="tab-pane h-100 active" id="app-welcome" role="tabpanel">
                <div class="appnavbar-content-wrapper">
                    <div class="d-flex flex-column justify-content-center text-center h-100 w-100">
                        <div class="container">
                            <div class="avatar avatar-lg mb-2">
                                <img class="avatar-img" :src="'/assets/media/avatar/user.png'" alt="">
                            </div>

                            <h5>Hey, Christina!</h5>
                            <p class="text-muted">Please select a app to Start using it.</p>

                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane h-100" id="notes" role="tabpanel" aria-labelledby="notes-tab">
                <div class="appnavbar-content-wrapper">
                    <div class="appnavbar-scrollable-wrapper">
                        <div class="appnavbar-heading sticky-top">
                            <ul class="nav justify-content-between align-items-center">
                                <!-- Sidebar Title Start -->
                                <li class="text-center">
                                    <h5 class="text-truncate mb-0">Notes</h5>
                                </li>

                                <li class="nav-item list-inline-item">
                                    <div data-appcontent-close="">
                                        <svg class="hw-22" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </div>
                                </li>

                            </ul>
                        </div>

                        <div class="appnavbar-body">
                            <div class="appnavbar-body-title">
                                <div class="dropdown mr-2">
                                    <button class="btn btn-outline-default dropdown-toggle" type="button" data-notes-filter-list="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Notes</button>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" data-notes-filter="" data-select="all-chats" href="#">All Notes</a>
                                        <a class="dropdown-item" data-notes-filter="" data-select="friends" href="#">Personal</a>
                                        <a class="dropdown-item" data-notes-filter="" data-select="groups" href="#">Work</a>
                                        <a class="dropdown-item" data-notes-filter="" data-select="unread" href="#">Favourite</a>
                                        <a class="dropdown-item" data-notes-filter="" data-select="archived" href="#">Important</a>
                                    </div>
                                </div>

                                <form class="form-inline">
                                    <div class="input-group">
                                        <input type="text" class="form-control search border-right-0 transparent-bg pr-0" placeholder="Search notes">
                                        <div class="input-group-append">
                                            <div class="input-group-text transparent-bg border-left-0" role="button">
                                                <svg class="text-muted hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- Sidebar Search End -->
                            </div>

                            <div class="note-container">
                                <div class="note">
                                    <div class="note-body">
                                        <div class="note-added-on">Sunday, 20/12/2020 at 12:26 PM</div>
                                        <h5 class="note-title">Metting with John Doe</h5>
                                        <p class="note-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, dolorum odio vitae sapiente eius obcaecati.</p>
                                    </div>
                                    <div class="note-footer">
                                        <div class="note-tools">
                                            <span class="badge badge-info">Personal</span>
                                        </div>
                                        <div class="note-tools">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary btn-icon btn-minimal btn-sm text-muted" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="hw-20" xmlns="http://www.w3.org/2000/svg" height="24" width="24"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                                                    </svg>

                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">Personal</a>
                                                    <a class="dropdown-item" href="#">Work</a>
                                                    <a class="dropdown-item" href="#">Favourite</a>
                                                    <a class="dropdown-item" href="#">Important</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item text-danger" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="note">
                                    <div class="note-body">
                                        <div class="note-added-on">Sunday, 20/12/2020 at 12:26 PM</div>
                                        <h5 class="note-title">Metting with John Doe</h5>
                                        <p class="note-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, dolorum odio vitae sapiente eius obcaecati.</p>
                                    </div>
                                    <div class="note-footer">
                                        <div class="note-tools">
                                            <span class="badge badge-danger">Important</span>
                                        </div>
                                        <div class="note-tools">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary btn-icon btn-minimal btn-sm text-muted" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="hw-20" xmlns="http://www.w3.org/2000/svg" height="24" width="24"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">Personal</a>
                                                    <a class="dropdown-item" href="#">Work</a>
                                                    <a class="dropdown-item" href="#">Favourite</a>
                                                    <a class="dropdown-item" href="#">Important</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item text-danger" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="note">
                                    <div class="note-body">
                                        <div class="note-added-on">Sunday, 20/12/2020 at 12:26 PM</div>
                                        <h5 class="note-title">Metting with John Doe</h5>
                                        <p class="note-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, dolorum odio vitae sapiente eius obcaecati.</p>
                                    </div>
                                    <div class="note-footer">
                                        <div class="note-tools">
                                            <span class="badge badge-primary">Favourite</span>
                                        </div>
                                        <div class="note-tools">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary btn-icon btn-minimal btn-sm text-muted" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="hw-20" xmlns="http://www.w3.org/2000/svg" height="24" width="24"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">Personal</a>
                                                    <a class="dropdown-item" href="#">Work</a>
                                                    <a class="dropdown-item" href="#">Favourite</a>
                                                    <a class="dropdown-item" href="#">Important</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item text-danger" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="note">
                                    <div class="note-body">
                                        <div class="note-added-on">Sunday, 20/12/2020 at 12:26 PM</div>
                                        <h5 class="note-title">Metting with John Doe</h5>
                                        <p class="note-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, dolorum odio vitae sapiente eius obcaecati.</p>
                                    </div>
                                    <div class="note-footer">
                                        <div class="note-tools">
                                            <span class="badge badge-warning">Work</span>
                                        </div>
                                        <div class="note-tools">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary btn-icon btn-minimal btn-sm text-muted" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="hw-20" xmlns="http://www.w3.org/2000/svg" height="24" width="24"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">Personal</a>
                                                    <a class="dropdown-item" href="#">Work</a>
                                                    <a class="dropdown-item" href="#">Favourite</a>
                                                    <a class="dropdown-item" href="#">Important</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item text-danger" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="appnavbar-footer">
                            <div class="btn btn-primary btn-block" role="button" data-toggle="modal" data-target="#addNoteModal">Add new note</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane h-100" id="todo" role="tabpanel" aria-labelledby="todo-tab">
                <div class="appnavbar-content-wrapper">
                    <div class="appnavbar-scrollable-wrapper">
                        <div class="appnavbar-heading sticky-top">
                            <ul class="nav justify-content-between align-items-center">
                                <!-- Sidebar Title Start -->
                                <li class="text-center">
                                    <h5 class="text-truncate mb-0">To-do List</h5>
                                </li>
                                <li class="nav-item list-inline-item">
                                    <div data-appcontent-close="">
                                        <svg class="hw-22" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="appnavbar-body">
                            <div class="appnavbar-body-title">
                                <!-- Sidebar Header Dropdown Start -->
                                <div class="dropdown mr-2">
                                    <button class="btn btn-outline-default dropdown-toggle" type="button" data-tasks-filter-list="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Tasks</button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" data-task-filter="" data-select="all-tasks" href="#">All Tasks</a>
                                        <a class="dropdown-item" data-task-filter="" data-select="active" href="#">Active</a>
                                        <a class="dropdown-item" data-task-filter="" data-select="finished" href="#">Finished</a>
                                    </div>
                                    <!-- Dropdown Menu End -->
                                </div>
                                <!-- Sidebar Header Dropdown End -->

                                <!-- Sidebar Search Start -->
                                <form class="form-inline">
                                    <div class="input-group">
                                        <input type="text" class="form-control search border-right-0 transparent-bg pr-0" placeholder="Search notes">
                                        <div class="input-group-append">
                                            <div class="input-group-text transparent-bg border-left-0" role="button">
                                                <svg class="text-muted hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- Sidebar Search End -->
                            </div>

                            <div class="todo-container">

                                <div class="todo-title">
                                    <h6 class="mb-0">20/07/2020</h6>
                                    <p class="text-muted">6 Task remaining</p>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <ul class="todo-list">
                                            <li class="todo-item todo-task-done">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1" checked>
                                                    <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                                </div>
                                                <h6 class="todo-title" data-toggle="modal" data-target="#taskModal">Dinner with friends</h6>
                                            </li>
                                            <li class="todo-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                    <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                                </div>
                                                <h6 class="todo-title" data-toggle="modal" data-target="#taskModal">Watching movie at 10:30PM</h6>
                                            </li>
                                            <li class="todo-item todo-task-done">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck3" checked>
                                                    <label class="custom-control-label" for="customCheck3">&nbsp;</label>
                                                </div>
                                                <h6 class="todo-title" data-toggle="modal" data-target="#taskModal">Watching a football match</h6>
                                            </li>
                                            <li class="todo-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck4">
                                                    <label class="custom-control-label" for="customCheck4">&nbsp;</label>
                                                </div>
                                                <h6 class="todo-title" data-toggle="modal" data-target="#taskModal">Coffie with girlfriend</h6>
                                            </li>
                                            <li class="todo-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck5">
                                                    <label class="custom-control-label" for="customCheck5">&nbsp;</label>
                                                </div>
                                                <h6 class="todo-title" data-toggle="modal" data-target="#taskModal">Meeting with design team</h6>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="todo-title mt-2">
                                    <h6 class="mb-0">21/07/2020</h6>
                                    <p class="text-muted">6 Task remaining</p>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <ul class="todo-list">
                                            <li class="todo-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck6">
                                                    <label class="custom-control-label" for="customCheck6">&nbsp;</label>
                                                </div>
                                                <h6 class="todo-title" data-toggle="modal" data-target="#taskModal">Dinner with friends</h6>
                                            </li>
                                            <li class="todo-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck7">
                                                    <label class="custom-control-label" for="customCheck7">&nbsp;</label>
                                                </div>
                                                <h6 class="todo-title" data-toggle="modal" data-target="#taskModal">Watching movie at 10:30PM</h6>
                                            </li>
                                            <li class="todo-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck8">
                                                    <label class="custom-control-label" for="customCheck8">&nbsp;</label>
                                                </div>
                                                <h6 class="todo-title" data-toggle="modal" data-target="#taskModal">Watching a football match</h6>
                                            </li>
                                            <li class="todo-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck9">
                                                    <label class="custom-control-label" for="customCheck9">&nbsp;</label>
                                                </div>
                                                <h6 class="todo-title" data-toggle="modal" data-target="#taskModal">Coffie with girlfriend</h6>
                                            </li>
                                            <li class="todo-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck10">
                                                    <label class="custom-control-label" for="customCheck10">&nbsp;</label>
                                                </div>
                                                <h6 class="todo-title" data-toggle="modal" data-target="#taskModal">Meeting with design team</h6>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="appnavbar-footer">
                            <div class="btn btn-primary btn-block" role="button" data-toggle="modal" data-target="#addTaskModal">Add new task</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane h-100" id="quick-settings" role="tabpanel" aria-labelledby="quick-settings-tab">
                <div class="appnavbar-content-wrapper">
                    <div class="appnavbar-scrollable-wrapper">
                        <div class="appnavbar-heading sticky-top">
                            <ul class="nav justify-content-between align-items-center">
                                <!-- Sidebar Title Start -->
                                <li class="text-center">
                                    <h5 class="text-truncate mb-0">Settings</h5>
                                </li>

                                <li class="nav-item list-inline-item">
                                    <div data-appcontent-close="">
                                        <svg class="hw-22" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="appnavbar-body">
                            <div class="settings-container">
                                <ul class="list-group border list-group-flush">
                                    <li class="list-group-item py-2">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <p class="mb-0">Last seen</p>
                                            </div>
                                            <div class="custom-control custom-switch ml-2">
                                                <input type="checkbox" class="custom-control-input" id="quickSettingSwitch1" checked="">
                                                <label class="custom-control-label" for="quickSettingSwitch1">&nbsp;</label>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item py-2">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <p class="mb-0">Read receipts</p>
                                            </div>
                                            <div class="custom-control custom-switch ml-2">
                                                <input type="checkbox" class="custom-control-input" id="quickSettingSwitch2" checked="">
                                                <label class="custom-control-label" for="quickSettingSwitch2">&nbsp;</label>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item py-2">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <p class="mb-0">Media auto download</p>
                                            </div>
                                            <div class="custom-control custom-switch ml-2">
                                                <input type="checkbox" class="custom-control-input" id="quickSettingSwitch3" checked="">
                                                <label class="custom-control-label" for="quickSettingSwitch3">&nbsp;</label>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item py-2">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <p class="mb-0">Notifications</p>
                                            </div>
                                            <div class="custom-control custom-switch ml-2">
                                                <input type="checkbox" class="custom-control-input" id="quickSettingSwitch4" checked="">
                                                <label class="custom-control-label" for="quickSettingSwitch4">&nbsp;</label>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item py-2">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <p class="mb-0">Auto backup</p>
                                            </div>
                                            <div class="custom-control custom-switch ml-2">
                                                <input type="checkbox" class="custom-control-input" id="quickSettingSwitch5" checked="">
                                                <label class="custom-control-label" for="quickSettingSwitch5">&nbsp;</label>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item py-2">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <p class="mb-0">Screen Lock</p>
                                            </div>
                                            <div class="custom-control custom-switch ml-2">
                                                <input type="checkbox" class="custom-control-input" id="quickSettingSwitch6">
                                                <label class="custom-control-label" for="quickSettingSwitch6">&nbsp;</label>

                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>

                        <div class="appnavbar-footer">
                            <div class="btn btn-primary btn-block">Save settings</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {

        }
    }
</script>
