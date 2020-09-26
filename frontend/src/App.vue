<template>
  <v-app>
    <v-app-bar app color="primary" dark extended v-if="isHome">
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"> </v-app-bar-nav-icon>

      <v-toolbar-title>{{ appName }}</v-toolbar-title>

      <v-spacer></v-spacer>

      <v-btn icon>
        <v-badge color="red" overlap>
          <template v-slot:badge>
            <span>{{ countCart }}</span>
          </template>
          <v-icon>
            mdi-cart
          </v-icon>
        </v-badge>
      </v-btn>

      <v-text-field
        slot="extension"
        hide-details
        append-icon="mdi-microphone"
        flat
        label="Search"
        prepend-inner-icon="mdi-magnify"
        solo-inverted
        class="p-2"
        @click="dialog = true"
      ></v-text-field>
    </v-app-bar>
    <v-app-bar app color="primary" dark v-else>
      <v-btn icon @click.stop="$router.go(-1)">
        <v-icon>mdi-arrow-left-circle</v-icon>
      </v-btn>
      <v-spacer></v-spacer>
      <v-btn icon to="/about">
        <v-badge color="red" overlap>
          <template v-slot:badge>
            <span>{{ countCart }}</span>
          </template>
          <v-icon>mdi-cart</v-icon>
        </v-badge>
      </v-btn>
    </v-app-bar>
    <v-card>
      <v-navigation-drawer app v-model="drawer">
        <v-list-item v-if="!guest">
          <v-list-item-avatar>
            <v-img src="https://randomuser.me/api/portraits/men/78.jpg"></v-img>
          </v-list-item-avatar>
          <v-list-item-content>
            <v-list-item-title>John</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <div class="pa-2" v-if="guest">
          <v-btn block color="primary" class="mb-1">
            <v-icon left>mdi-lock</v-icon>
            Login
          </v-btn>
          <v-btn block color="success">
            <v-icon left>mdi-account</v-icon>
            Register
          </v-btn>
        </div>

        <v-divider></v-divider>

        <v-list>
          <v-list-item
            v-for="(item, index) in menus"
            :key="`menu-` + index"
            :to="item.route"
          >
            <v-list-item-icon>
              <v-icon left>
                {{ item.icon }}
              </v-icon>
            </v-list-item-icon>

            <v-list-item-content>
              <v-list-item-title>
                {{ item.title }}
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list>

        <template v-slot:append v-if="!guest">
          <div class="pa-2">
            <v-btn block color="red" dark @click="logout">
              <v-icon left>mdi-lock</v-icon>
              Logout
            </v-btn>
          </div>
        </template>
      </v-navigation-drawer>
    </v-card>

    <Alert />

    <v-dialog
      v-model="dialog"
      fullscrenn
      hide-overlay
      transition="scale-transition"
    >
      <Search @closed="closeDialog" />
    </v-dialog>

    <v-main>
      <v-container>
        <v-slide-y-transition>
          <!-- If using vue-router -->
          <router-view></router-view>
        </v-slide-y-transition>
      </v-container>
    </v-main>

    <v-card>
      <v-footer absolute app>
        <v-card-text class="text-center">
          &copy; {{ new Date().getFullYear() }} - <strong>VueShop</strong>
        </v-card-text>
      </v-footer>
    </v-card>
  </v-app>
</template>

<script>
import { mapGetters } from 'vuex';
export default {
  name: 'App',

  components: {
    Alert: () => import('@/components/Alert.vue'),
    Search: () => import('@/components/Search.vue'),
  },

  data: () => ({
    dialog: false,
    drawer: false,
    guest: true,
    menus: [
      { title: 'Home', icon: 'mdi-home', route: '/' },
      { title: 'About', icon: 'mdi-account', route: '/about' },
    ],
  }),

  mounted() {
    console.log(process.env);
  },

  computed: {
    isHome() {
      return this.$route.path == '/';
    },

    ...mapGetters({
      countCart: 'cart/count',
    }),
  },
  methods: {
    closeDialog(value) {
      this.dialog = value;
    },
  },
};
</script>
