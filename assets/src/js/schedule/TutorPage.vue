<template >
  <v-app>

  <div>

    <v-navigation-drawer expand-on-hover permanent fixed floating width="300" mole-break-point="991" app dark persistent>
      <v-img src="" height="100%">
        <v-list-item link @click="userSettings = !userSettings">
          <v-list-item-avatar>
            <v-img src="https://image.flaticon.com/icons/svg/265/265674.svg" height="40" min-height="40" width="40" />
          </v-list-item-avatar>
          <v-list-item-content>
            <v-list-item-title>
              LMS v0.1
            </v-list-item-title>
          </v-list-item-content>
          <v-list-item-icon>
            <v-icon>mdi-menu-down</v-icon>
          </v-list-item-icon>
        </v-list-item>
        <v-list v-if="userSettings" dense nav>
          <v-list-item-group>
            <v-list-item links>
              <v-list-item-icon text>
                PF
              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title>
                  Profile
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>
            <v-list-item links>
              <v-list-item-icon text>
                BI
              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title>
                  Bio
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list-item-group>
        </v-list>



        <v-divider></v-divider>

        <v-list nav dense>
          <v-list-item @click="setMenu('dashboard')" links style="background-color: #e91e63 !important;
          border-color: #e91e63 !important;">
          <v-list-item-icon>
            <v-icon>mdi-folder</v-icon>
          </v-list-item-icon>
          <v-list-item-title>Dashboard</v-list-item-title>
        </v-list-item>


        <v-list v-if="menus['dashboard']" dense nav>
          <v-list-item-group>
            <v-list-item links @click="$router.push('/MemberStudentEvaluation')">
              <v-list-item-icon text>

              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title>
                  Stats
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>

            <v-list-item links>
              <v-list-item-icon text>

              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title>
                  Timetable
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>

            <v-list-item links>
              <v-list-item-icon text>

              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title>
                  Notifications
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>

            <v-list-item links>
              <v-list-item-icon text>

              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title>
                  Messages/Chat
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list-item-group>
        </v-list>


        <v-list-item link @click="setMenu('members'), $router.push('/Member')">
          <v-list-item-icon>
            <v-icon>mdi-account-multiple</v-icon>
          </v-list-item-icon>
          <v-list-item-title>Members</v-list-item-title>
        </v-list-item>

        <v-list v-if="menus['members']" dense nav>
          <v-list-item-group>
            <v-list-item links @click="$router.push('/MemberAddStudent2')">
              <v-list-item-icon text>

              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title>
                  Students
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>

            <v-list-item links>
              <v-list-item-icon text>

              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title>
                  Admin
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>

            <v-list-item links  @click="$router.push('/MemberTutor')">
              <v-list-item-icon text>

              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title>
                  Tutors
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>

            <v-list-item links>
              <v-list-item-icon text>

              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title>
                  Attendance
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list-item-group>
        </v-list>



        <v-list-item link @click="setMenu('classes'), $router.push('/MemberClass')">
          <v-list-item-icon>
            <v-icon>mdi-book-variant</v-icon>
          </v-list-item-icon>
          <v-list-item-title>Classes</v-list-item-title>
        </v-list-item>


        <v-list v-if="menus['classes']" dense nav>
          <v-list-item-group>

            <v-list-item links @click="$router.push('/ClassesMyClass')">
              <v-list-item-icon text>

              </v-list-item-icon>

              <v-list-item-content>
                <v-list-item-title>
                  My Classes
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>

            <v-list-item links>
              <v-list-item-icon text>

              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title>
                  Academies
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>

            <v-list-item links>
              <v-list-item-icon text>

              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title>
                  Outgoing Call List
                </v-list-item-title>
              </v-list-item-content>


            </v-list-item>
            <v-list-item links>
              <v-list-item-icon text>

              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title>
                  Group SMS
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>


            <v-list-item links>
              <v-list-item-icon text>

              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title>
                  Take Over
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>

            <v-list-item links>
              <v-list-item-icon text>

              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title>
                  Recordings
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>


            <v-list-item links>
              <v-list-item-icon text>

              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title>
                  Coupons
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list-item-group>
        </v-list>


        <v-list-item link @click="setMenu('boards')">
          <v-list-item-icon>
            <v-icon>mdi-clipboard-text</v-icon>
          </v-list-item-icon>
          <v-list-item-title>Boards</v-list-item-title>
        </v-list-item>


        <v-list v-if="menus['boards']" dense nav>
          <v-list-item-group>
            <v-list-item links>
              <v-list-item-icon text>

              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title>
                  Announcements
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>

            <v-list-item links>
              <v-list-item-icon text>

              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title>
                  Q&A
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>

            <v-list-item links>
              <v-list-item-icon text>

              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title>
                  Proofreading
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>

            <v-list-item links>
              <v-list-item-icon text>

              </v-list-item-icon>
              <v-list-item-content>
                <v-list-item-title>
                  FAQ
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>

          </v-list-item-group>
        </v-list>
      </v-list>
    </v-img>
  </v-navigation-drawer>

  </div>
  <v-content style="padding: 0px;">
  <schedule></schedule>
  </v-content>
</v-app>
</template>

<script>

import schedule from './Schedule.vue'
export default {

  components: {schedule},
  data(){
    return{
      userSettings: false,
      expand: false,
      menus: {
        dashboard: false,
        members: false,
        classes: false,
        boards: false
      },


    }
  },

  mounted(){

    console.log(this.$route)
  },

  watch: {
    $route(to, from) {
      console.log(to)
      console.log(from)
    }

  },

  methods: {
    setMenu(selectedMenu){
      for(var menu in this.menus){
        if(menu === selectedMenu){
          this.menus[menu] = !this.menus[menu]
        }
        else{
          this.menus[menu] = false
        }
      }
      console.log(this.menus)
    }
  }
}
</script>

<style>
/* Remove in 1.2 */
.v-datatable thead th.column.sortable i {
  vertical-align: unset;
}
</style>
