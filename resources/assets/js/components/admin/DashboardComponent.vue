<template>
    <v-app dark>
        <v-navigation-drawer app v-model="drawer" stateless floating width='220'>
            <v-toolbar class="brown darken-3">
                <v-list>
                    <v-list-tile>
                        <v-list-tile-content>
                            <v-list-tile-title class="title">
                                <v-icon>data_usage</v-icon>
                                LearningSS
                            </v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                </v-list>
            </v-toolbar>
            <v-list>
                <!-- using @click=""  for event click -->
                <v-list-tile v-for="(title, icon) in mainMenu"  :key="title">
                    <v-list-tile-action>
                        <v-icon>{{ icon }}</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>{{ title }}</v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
            </v-list>
        </v-navigation-drawer>
        <v-toolbar class="brown darken-4" app="app">
            <v-toolbar-side-icon @click.stop="clickToggleDrawer"></v-toolbar-side-icon>
            <v-spacer></v-spacer>
            <v-btn icon="icon">
                <v-icon>search</v-icon>
            </v-btn>
            <v-btn icon="icon">
                <v-icon>email</v-icon>
            </v-btn>
            <v-menu offset-y="offset-y">
                <v-btn flat="flat" slot="activator" small="small">John Doe
                    <v-icon>keyboard_arrow_down</v-icon>
                </v-btn>
                <v-list>
                    <v-list-tile >
                        <v-icon class="mr-2">settings</v-icon>
                        <v-list-tile-title>Settings</v-list-tile-title>
                    </v-list-tile>                 
                    <v-list-tile @click.prevent="logout">
                        <v-icon class="mr-2">exit_to_app</v-icon>
                        <v-list-tile-title>Logout</v-list-tile-title>
                    </v-list-tile>
                </v-list>
            </v-menu>
            <v-avatar class="mr-2" size="36"><img src="" /></v-avatar>
        </v-toolbar>

        <v-content>
            <v-container fluid pa-4 grid-list-md>
                <!-- <router-view></router-view> -->
                <v-layout wrap="wrap">
                    <v-flex xs12="xs12">
                        <h1 class="display-1 mb-1">Dashboard</h1>
                    </v-flex>
                    <v-flex xs12="xs12" md6="md6">
                        <v-layout wrap="wrap">
                            <v-flex v-for="stat in stats" xs6="xs6" :key="stat.id">
                                <v-card class="text-xs-center" height="100%">
                                    <v-card-text>
                                        <div class="display-1 mb-2">{{ stat.number }}</div>{{ stat.label }}</v-card-text>
                                </v-card>
                            </v-flex>
                        </v-layout>
                    </v-flex>
                    <v-flex md6="md6">
                        <v-card height="100%">
                            <v-card-title class="grey darken-4">Tasks</v-card-title>
                            <v-data-table class="mt-1" :items="tasks" hide-headers="hide-headers" hide-actions="hide-actions">
                                <template slot="items" slot-scope="props">
                                    <td ><v-checkbox @click.once='clickDeleteTask(props.item)'></v-checkbox></td>
                                    <td>{{ props.item.title }}</td>
                                </template>
                            </v-data-table>
                        </v-card>
                    </v-flex>
                    <v-flex xs12="xs12">
                        <v-card>
                            <v-card-title class="grey darken-4">New Leads
                                <v-spacer></v-spacer>
                                <v-text-field v-model="newLeadsSearch" append-icon="search" label="Search"></v-text-field>
                            </v-card-title>
                            <v-data-table :headers="newLeadsHeaders" :items="newLeads" :search="newLeadsSearch">
                                <template slot="items" slot-scope="props">
                                    <td>{{ props.item.firstName }} {{ props.item.lastName }}</td>
                                    <td>{{ props.item.email }}</td><td>{{ props.item.company }}</td>
                                </template>
                            </v-data-table>
                        </v-card>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-content>

        <v-footer app></v-footer>
    </v-app>
</template>

<script>
    export default {
        name: 'admin-board',
        data() {
            return {
                drawer: true,
                mainMenu: {
                    dashboard: 'Dashboard',
                    people: 'Leads',
                    business: 'Companies',
                    business_center: 'Deals',
                    file_copy: 'Invoices',
                    settings: 'Settings',
                },
                newLeadsSearch: '',
                tasks: [
                    {
                        id: 0,
                        title: 'Book meeting for Thursday'
                    },
                    {
                        id: 1,
                        title: 'Review new leads'
                    },
                    {
                        id: 2,
                        title: 'Be awesome!'
                    },
                ]
            }
        },
        methods: {
            clickToggleDrawer() {
                this.drawer = !this.drawer // show/hide right toolbar
            },
            clickDeleteTask(task) {
                const i = this.tasks.indexOf(task);
                console.log(this.tasks.length);
                this.tasks.splice(i, 1);
            },
            logout() {
                this.$store.dispatch('logout').then(() => {
                    this.$router.push('/login');
                });
            }
        },
        computed: {
            stats() {
                return [
                    {
                        number: '42',
                        label: 'New leads this week',
                    },
                    {
                        number: '$8,312',
                        label: 'Sales this week',
                    },
                    {
                        number: '233',
                        label: 'New leads this month',
                    },
                    {
                        number: '$24,748',
                        label: 'Sales this month',
                    },
                ]
            },
            newLeads() {
                return [
                    {
                        firstName: 'Giselbert',
                        lastName: 'Hartness',
                        email: 'ghartness0@mail.ru',
                        company: 'Kling LLC',
                    },
                    {
                        firstName: 'Honey',
                        lastName: 'Allon',
                        email: 'hallon1@epa.gov',
                        company: 'Rogahn-Hermann',
                    },
                    {
                        firstName: 'Tommy',
                        lastName: 'Rickards',
                        email: 'trickards2@timesonline.co.uk',
                        company: 'Kreiger, Wehner and Lubowitz',
                    },
                    {
                        firstName: 'Giffy',
                        lastName: 'Farquharson',
                        email: 'gfarquharson3@goo.gl',
                        company: 'Heathcote-Funk',
                    },
                    {
                        firstName: 'Rahel',
                        lastName: 'Matches',
                        email: 'rmatches4@sfgate.com',
                        company: 'Maggio, Russel and Feeney',
                    },
                    {
                        firstName: 'Krystal',
                        lastName: 'Natte',
                        email: 'knatte5@opera.com',
                        company: 'Sanford-Feeney',
                    },
                    {
                        firstName: 'Ronnica',
                        lastName: 'Galliver',
                        email: 'rgalliver6@epa.gov',
                        company: 'Schaefer Group',
                    },
                    {
                        firstName: 'Jenny',
                        lastName: 'Bugge',
                        email: 'jbugge7@independent.co.uk',
                        company: 'Gutmann, Miller and Prosacco',
                    },
                    {
                        firstName: 'Tracee',
                        lastName: 'Viscovi',
                        email: 'tviscovi8@techcrunch.com',
                        company: 'Anderson, Kohler and Renner',
                    },
                    {
                        firstName: 'Teodor',
                        lastName: 'Fitzsimmons',
                        email: 'tfitzsimmons9@mediafire.com',
                        company: 'Durgan-Kovacek',
                    },
                ]
            },
            newLeadsHeaders() {
                return [
                    {
                        text: 'Name',
                        value: 'firstName',
                    },
                    {
                        text: 'Email',
                        value: 'email',
                    },
                    {
                        text: 'Company',
                        value: 'company',
                    },
                ]
            },
            currentUser() {
                return this.$store.getters.user;
            }
        }
        
    }
</script>
