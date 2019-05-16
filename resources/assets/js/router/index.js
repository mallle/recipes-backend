// import Vue from 'vue'
// import Router from 'vue-router'
//

Vue.use(Router)

export default new Router({
    mode: 'history',
    linkActiveClass: 'open active',
    scrollBehavior: () => ({y: 0}),
    routes: [
        {
            path: '/admin/login/:redirect?',
            name: 'Login',
            component: Login
        },
        {
            path: '/admin/logout',
            name: 'Logout',
            component: Logout
        },
        {
            path: '/admin',
            redirect: '/admin/dashboard',
            name: 'Home',
            component: Full,
            meta: {auth: true},
            children: [
                /**
                 * Dashboard
                 */
                {
                    path: '/admin/dashboard',
                    name: 'Dashboard',
                    component: Dashboard
                },
                /**
                 * Pages
                 */
                {
                    path: '/admin/pages',
                    name: 'Pages',
                    component: Pages,
                    redirect: '/admin/pages/1/1',
                    children: [
                        {
                            path: ':node_id/:workspace_id',
                            name: 'Node',
                            component: Node,
                            children: [
                                {
                                    path: 'version/add',
                                    name: 'addVersion',
                                    component: AddVersion
                                },
                                {
                                    path: 'version/:version_id',
                                    name: 'Version',
                                    component: Version,
                                    children: [
                                        {
                                            path: 'revision/:revision_id/:section_id?',
                                            name: 'revision',
                                            component: Revision
                                        }
                                    ]
                                },
                                {
                                    path: 'version/:version_id/revision/add',
                                    name: 'addRevision',
                                    component: AddRevision
                                },
                                {
                                    path: 'version/:version_id/revision/:revision_id/edit',
                                    name: 'editRevision',
                                    component: EditRevision
                                },
                                {
                                    path: 'version/:version_id/revision/:revision_id/section/create',
                                    name: 'createSection',
                                    component: CreateSection
                                },
                                {
                                    path: 'version/:version_id/revision/:revision_id/section/:section_id/edit',
                                    name: 'editSection',
                                    component: EditSection
                                },
                                {
                                    path: 'version/:version_id/revision/:revision_id/section/:section_id/content/create',
                                    name: 'listPanels',
                                    component: ListPanels
                                },
                                {
                                    path: 'version/:version_id/revision/:revision_id/section/:section_id/content/create/:panel_name/:position?',
                                    name: 'createContent',
                                    component: CreateContent
                                },
                                {
                                    path: 'version/:version_id/revision/:revision_id/section/:section_id/content/edit/:content_id',
                                    name: 'editContent',
                                    component: EditContent
                                }
                            ]
                        }
                    ]
                },
                /**
                 * Media
                 */
                {
                    path: '/admin/media',
                    name: 'Media',
                    component: Media,
                    redirect: '/admin/media/%2F',
                    children: [
                        {
                            path: ':path',
                            name: 'FileExplorer',
                            component: FileExplorer
                        }
                    ]
                },
                {
                    path: '/admin/settings',
                    name: 'settings',
                    component: Settings,
                    redirect: '/admin/settings/locales',
                    children: [
                        {
                            path: 'locales',
                            name: 'settings.locales.list',
                            component: ListLocales
                        },
                        {
                            path: 'locales/edit/:locale_id',
                            name: 'settings.locales.edit',
                            component: EditLocale
                        },
                        {
                            path: 'locales/add',
                            name: 'settings.locales.add',
                            component: AddLocale,
                        },

                        {
                            path: 'users',
                            name: 'settings.users.list',
                            component: ListUsers,
                        },
                        {
                            path: 'users/add',
                            name: 'settings.users.add',
                            component: AddUser
                        },
                        {
                            path: 'users/edit/:user_id',
                            name: 'settings.users.edit',
                            component: EditUser
                        },

                        {
                            path: 'roles',
                            name: 'settings.roles.list',
                            component: ListRoles,
                        },
                        {
                            path: 'roles/add',
                            name: 'settings.roles.add',
                            component: AddRole
                        },
                        {
                            path: 'roles/edit/:role_id',
                            name: 'settings.roles.edit',
                            component: EditRole
                        },

                        {
                            path: 'list',
                            name: 'settings.abilities.list',
                            component: ListAbilities
                        },
                        {
                            path: 'nested',
                            name: 'settings.abilities.nested',
                            component: NestedAbilities,
                            children : [
                                {
                                    path: 'list',
                                    name: 'settings.abilities.nested.list',
                                    component: ListNestedAbilities
                                }
                            ]
                        }
                    ]
                }
            ]
        }
    ]
})
