<template>
    <aside class="sidebar">
        <div class="tab-content">
            <div class="tab-pane active" id="chats-content">
                <div class="d-flex flex-column h-100">
                    <div class="hide-scrollbar h-100" id="chatContactsList">
                        <div class="sidebar-header sticky-top p-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="font-weight-semibold mb-0">Chats</h5>
                                <ul class="nav flex-nowrap">

                                    <li class="nav-item list-inline-item mr-1">
                                        <a class="nav-link text-muted px-1" href="#" title="Notifications" role="button" data-toggle="modal" data-target="#notificationModal">
                                            <svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                                            </svg>
                                        </a>
                                    </li>

                                    <li class="nav-item list-inline-item d-block d-xl-none mr-1">
                                        <a class="nav-link text-muted px-1" href="#" title="Appbar" data-toggle-appbar="">
                                            <svg class="hw-20" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                                        </a>
                                    </li>

                                    <li class="nav-item list-inline-item mr-0">
                                        <div class="dropdown">
                                            <a class="nav-link text-muted px-1" href="#" role="button" title="Details" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                                                </svg>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" role="button" data-toggle="modal" data-target="#startConversation">New Chat</a>
                                                <a class="dropdown-item" href="#" role="button" data-toggle="modal" data-target="#createGroup">Create Group</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="sidebar-sub-header">
                                <div class="dropdown mr-2">
                                    <button class="btn btn-outline-default dropdown-toggle" type="button" data-chat-filter-list="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        All Chats
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" data-chat-filter="" data-select="all-chats" href="#">All Chats</a>
                                        <a class="dropdown-item" data-chat-filter="" data-select="friends" href="#">Friends</a>
                                        <a class="dropdown-item" data-chat-filter="" data-select="groups" href="#">Groups</a>
                                        <a class="dropdown-item" data-chat-filter="" data-select="unread" href="#">Unread</a>
                                        <a class="dropdown-item" data-chat-filter="" data-select="archived" href="#">Archived</a>
                                    </div>
                                </div>
                                <form class="form-inline">
                                    <div class="input-group">
                                        <input type="text" class="form-control search border-right-0 transparent-bg pr-0" placeholder="Search users">
                                        <div class="input-group-append">
                                            <div class="input-group-text transparent-bg border-left-0" role="button">
                                                <svg class="text-muted hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <ul v-if="$store.getters.chatLists.length > 0" class="contacts-list" id="chatContactTab" data-chat-list="">
                            <template v-for="(chat, ck) in $store.getters.chatLists" :key="ck">
                                <li class="contacts-item friends" v-if="chat.type === 'Single'">
                                    <a class="contacts-link" @click="openChat(chat)">
                                        <div class="avatar avatar-online">
                                            <img :src="'/assets/media/avatar/2.png'" alt="">
                                        </div>
                                        <div class="contacts-content">
                                            <div class="contacts-info">
                                                <h6 class="chat-name text-truncate">{{ chat.name }}</h6>
                                                <div class="chat-time">{{ chat.date }}</div>
                                            </div>
                                            <div class="contacts-texts">
                                                <p class="text-truncate">I’m sorry, I didn’t catch that. Could you please repeat?</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>

                                <li class="contacts-item groups" v-else>
                                    <a class="contacts-link">
                                        <div class="avatar bg-success text-light">
                                            <span>
                                                <svg class="hw-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="contacts-content">
                                            <div class="contacts-info">
                                                <h6 class="chat-name">{{ chat.name }}</h6>
                                                <div class="chat-time">{{ chat.date }}</div>
                                            </div>
                                            <div class="contacts-texts">
                                                <p class="text-truncate"><span>Jeny: </span>That’s pretty common. I heard that a lot of people had the same experience.</p>
                                                <div class="d-inline-flex align-items-center ml-1">
                                                    <svg class="hw-16 text-muted" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </template>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="friends-content">
                <div class="d-flex flex-column h-100">
                    <div class="hide-scrollbar" id="friendsList">
                        <!-- Chat Header Start -->
                        <div class="sidebar-header sticky-top p-2">

                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="font-weight-semibold mb-0">Groups</h5>
                                <ul class="nav flex-nowrap">
                                    <li class="nav-item list-inline-item mr-1">
                                        <a class="nav-link text-muted px-1" href="#" title="Notifications" role="button" data-toggle="modal" data-target="#notificationModal">
                                            <svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="nav-item list-inline-item mr-0">
                                        <div class="dropdown">
                                            <a class="nav-link text-muted px-1" href="#" role="button" title="Details" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                                                </svg>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#" role="button" data-toggle="modal" data-target="#startConversation">New Chat</a>
                                                <a class="dropdown-item" href="#" role="button" data-toggle="modal" data-target="#createGroup">Create Group</a>
                                                <a class="dropdown-item" href="#" role="button" data-toggle="modal" data-target="#inviteOthers">Invite Others</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="sidebar-sub-header">
                                <div class="dropdown mr-2">
                                    <button class="btn btn-outline-default dropdown-toggle" type="button" data-chat-filter-list="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        All Chats
                                    </button>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" data-chat-filter="" data-select="all-chats" href="#">All Chats</a>
                                        <a class="dropdown-item" data-chat-filter="" data-select="friends" href="#">Friends</a>
                                        <a class="dropdown-item" data-chat-filter="" data-select="groups" href="#">Groups</a>
                                        <a class="dropdown-item" data-chat-filter="" data-select="unread" href="#">Unread</a>
                                        <a class="dropdown-item" data-chat-filter="" data-select="archived" href="#">Archived</a>
                                    </div>
                                </div>
                                <form class="form-inline">
                                    <div class="input-group">
                                        <input type="text" class="form-control search border-right-0 transparent-bg pr-0" placeholder="Search users">
                                        <div class="input-group-append">
                                            <div class="input-group-text transparent-bg border-left-0" role="button">
                                                <svg class="text-muted hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <ul class="contacts-list" id="friendsTab" data-friends-list="">
                            <li>
                                <small class="font-weight-medium text-uppercase text-muted">A</small>
                            </li>
                            <li class="contacts-item active">
                                <a class="contacts-link" href="#">
                                    <div class="avatar">
                                        <img :src="'/assets/media/avatar/3.png'" alt="">
                                    </div>
                                    <div class="contacts-content">
                                        <div class="contacts-info">
                                            <h6 class="chat-name text-truncate">Albert K. Johansen</h6>
                                        </div>
                                        <div class="contacts-texts">
                                            <svg class="hw-16 text-muted mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                            </svg>
                                            <p class="text-muted mb-0">San Fransisco, CA</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <!-- friends Item End -->

                            <!-- friends Item Start -->
                            <li class="contacts-item">
                                <a class="contacts-link" href="#">
                                    <div class="avatar">
                                        <img :src="'/assets/media/avatar/3.png'" alt="">
                                    </div>
                                    <div class="contacts-content">
                                        <div class="contacts-info">
                                            <h6 class="chat-name text-truncate">Alice R. Botello</h6>
                                        </div>
                                        <div class="contacts-texts">
                                            <svg class="hw-16 text-muted mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                            </svg>
                                            <p class="text-muted mb-0">Brentwood, NY</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <small class="font-weight-medium text-uppercase text-muted">b</small>
                            </li>
                            <li class="contacts-item">
                                <a class="contacts-link" href="#">
                                    <div class="avatar">
                                        <img :src="'/assets/media/avatar/3.png'" alt="">
                                    </div>
                                    <div class="contacts-content">
                                        <div class="contacts-info">
                                            <h6 class="chat-name text-truncate">Brittany K. Williams</h6>
                                        </div>
                                        <div class="contacts-texts">
                                            <svg class="hw-16 text-muted mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                            </svg>
                                            <p class="text-muted mb-0">Scranton, PA</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <small class="font-weight-medium text-uppercase text-muted">C</small>
                            </li>
                            <li class="contacts-item">
                                <a class="contacts-link" href="#">
                                    <div class="avatar">
                                        <img :src="'/assets/media/avatar/3.png'" alt="">
                                    </div>
                                    <div class="contacts-content">
                                        <div class="contacts-info">
                                            <h6 class="chat-name text-truncate">Christopher Garcia</h6>
                                        </div>
                                        <div class="contacts-texts">
                                            <svg class="hw-16 text-muted mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                            </svg>
                                            <p class="text-muted mb-0">Riverside, CA</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="contacts-item">
                                <a class="contacts-link" href="#">
                                    <div class="avatar">
                                        <img :src="'/assets/media/avatar/3.png'" alt="">
                                    </div>
                                    <div class="contacts-content">
                                        <div class="contacts-info">
                                            <h6 class="chat-name text-truncate">Casey Mcbride</h6>
                                        </div>
                                        <div class="contacts-texts">
                                            <svg class="hw-16 text-muted mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                            </svg>
                                            <p class="text-muted mb-0">Zephyr, NC</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <small class="font-weight-medium text-uppercase text-muted">G</small>
                            </li>
                            <li class="contacts-item">
                                <a class="contacts-link" href="#">
                                    <div class="avatar">
                                        <img :src="'/assets/media/avatar/3.png'" alt="">
                                    </div>
                                    <div class="contacts-content">
                                        <div class="contacts-info">
                                            <h6 class="chat-name text-truncate">Gemma Mendez</h6>
                                        </div>
                                        <div class="contacts-texts">
                                            <svg class="hw-16 text-muted mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                            </svg>
                                            <p class="text-muted mb-0">Frederick, MD</p>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <small class="font-weight-medium text-uppercase text-muted">k</small>
                            </li>

                            <li class="contacts-item">
                                <a class="contacts-link" href="#">
                                    <div class="avatar">
                                        <img :src="'/assets/media/avatar/3.png'" alt="">
                                    </div>
                                    <div class="contacts-content">
                                        <div class="contacts-info">
                                            <h6 class="chat-name text-truncate">Katelyn Valdez</h6>
                                        </div>
                                        <div class="contacts-texts">
                                            <svg class="hw-16 text-muted mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                            </svg>

                                            <p class="text-muted mb-0">Jackson, TN</p>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li class="contacts-item">
                                <a class="contacts-link" href="#">
                                    <div class="avatar">
                                        <img :src="'/assets/media/avatar/3.png'" alt="">
                                    </div>
                                    <div class="contacts-content">
                                        <div class="contacts-info">
                                            <h6 class="chat-name text-truncate">Katherine Schneider</h6>
                                        </div>
                                        <div class="contacts-texts">
                                            <svg class="hw-16 text-muted mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                            </svg>

                                            <p class="text-muted mb-0">Saginaw, MI</p>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <small class="font-weight-medium text-uppercase text-muted">m</small>
                            </li>

                            <li class="contacts-item">
                                <a class="contacts-link" href="#">
                                    <div class="avatar">
                                        <img :src="'/assets/media/avatar/3.png'" alt="">
                                    </div>
                                    <div class="contacts-content">
                                        <div class="contacts-info">
                                            <h6 class="chat-name text-truncate">Maizie Edwards</h6>
                                        </div>
                                        <div class="contacts-texts">
                                            <!-- Default :: Inline SVG -->
                                            <svg class="hw-16 text-muted mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                            </svg>

                                            <p class="text-muted mb-0">Greensboro, NC</p>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <small class="font-weight-medium text-uppercase text-muted">s</small>
                            </li>

                            <li class="contacts-item">
                                <a class="contacts-link" href="#">
                                    <div class="avatar">
                                        <img :src="'/assets/media/avatar/3.png'" alt="">
                                    </div>
                                    <div class="contacts-content">
                                        <div class="contacts-info">
                                            <h6 class="chat-name text-truncate">Susan K. Taylor</h6>
                                        </div>
                                        <div class="contacts-texts">
                                            <svg class="hw-16 text-muted mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                            </svg>

                                            <p class="text-muted mb-0">Centerville, VA</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="profile-content">
                <div class="d-flex flex-column h-100">
                    <div class="hide-scrollbar">
                        <div class="sidebar-header sticky-top p-2 mb-3">
                            <h5 class="font-weight-semibold">Profile</h5>
                            <p class="text-muted mb-0">Personal Information & Settings</p>
                        </div>
                        <div class="container-xl">
                            <div class="row">
                                <div class="col">
                                    <div class="card card-body card-bg-5">
                                        <div class="d-flex flex-column align-items-center">
                                            <div class="avatar avatar-lg mb-3">
                                                <img class="avatar-img" :src="'/assets/media/avatar/3.png'" alt="">
                                            </div>

                                            <div class="d-flex flex-column align-items-center">
                                                <h5>{{ $store.getters.authUser.name }}</h5>
                                            </div>

                                            <div class="d-flex">
                                                <button @click="logout()" class="btn btn-outline-default mx-1" type="button">
                                                    <svg class="hw-18 d-none d-sm-inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                                                    </svg>
                                                    <span>Logout</span>
                                                </button>
                                                <button class="btn btn-outline-default mx-1 d-xl-none" data-profile-edit="" type="button">
                                                    <svg class="hw-18 d-none d-sm-inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    </svg>
                                                    <span>Settings</span>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="card-options">
                                            <div class="dropdown">
                                                <button class="btn btn-secondary btn-icon btn-minimal btn-sm text-muted text-muted" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                                                    </svg>
                                               </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Change Profile Picture</a>
                                                    <a class="dropdown-item" href="#">Change Number</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-3">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item py-2" v-if="$store.getters.authUser.phone">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <p class="small text-muted mb-0">Phone</p>
                                                        <p class="mb-0">{{ $store.getters.authUser?.phone }}</p>
                                                    </div>
                                                    <!-- Default :: Inline SVG -->
                                                    <svg class="text-muted hw-20 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                                    </svg>
                                                </div>
                                            </li>
                                            <!-- List Group Item End -->

                                            <!-- List Group Item Start -->
                                            <li class="list-group-item py-2">
                                                <div class="media align-items-center">
                                                    <div class="media-body">
                                                        <p class="small text-muted mb-0">Email</p>
                                                        <p class="mb-0">{{ $store.getters.authUser?.email }}</p>
                                                    </div>

                                                    <svg class="text-muted hw-20 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                                    </svg>

                                                </div>
                                            </li>
                                            <!-- List Group Item End -->

                                            <!-- List Group Item Start -->

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <UsersModal />
    </aside>
</template>

<script>
import http from "../../../config/http.js";
import UsersModal from "../../modals/UsersModal.vue";

export default {
    components:{
        UsersModal
    },
    data() {
        return {
            chatLists: []
        }
    },
    mounted() {

    },
    methods: {
        async logout() {
            await http.post('logout').then((response) => {
                this.$store.dispatch("logout")
                this.$tAlert('success', "Logout successfully.")
                window.location.reload()
            }).catch((error) => {
                this.$tAlert('error', error.response.statusText)
            });
        },

        openChat (chat) {
            // this.$store.dispatch("chatStart", chat)
            this.$emit('openchat', chat);
        }
    }
}
</script>
