<template>
  <v-container fluid>
    <div class="d-flex flex-row justify-space-between">
    	<v-row justify="center">
        <v-col cols="12" md="11">
          <v-card>
            <v-card-title class="headline">
              <div class="d-flex justify-content-center align-items-center mr-2" style="height:50px;width:50px;
              background-color:#1976d2;">
              <v-icon color="white" x-large>create</v-icon>
            </div>
              Writing Correction
            </v-card-title>
            <v-divider></v-divider>
            <v-list two-line>
              <v-list-item-group>
                <template v-for="(item, index) in items">
                  <v-list-item :key="item.title">
                    <template>
                      <v-list-item-avatar>
                        <v-icon x-large color="#1976d2">mdi-alpha-{{item.title.charAt(0).toLowerCase()}}-circle</v-icon>
                      </v-list-item-avatar>
                      <v-list-item-content>
                        <v-list-item-title v-text="item.title"></v-list-item-title>
                        <v-list-item-subtitle class="text--primary" v-text="item.headline"></v-list-item-subtitle>
                        <v-list-item-subtitle v-text="item.subtitle"></v-list-item-subtitle>
                      </v-list-item-content>

                      <v-list-item-action>
                        <v-list-item-action-text v-text="item.action"></v-list-item-action-text>
                      </v-list-item-action>
                    </template>
                  </v-list-item>

                  <v-divider
                    v-if="index < items.length"
                    :key="index"
                  ></v-divider>
                </template>
              </v-list-item-group>
            </v-list>

            <v-container>
              <v-row justify="end">
                <v-col align-self="end" cols="1">
                  <v-btn @click="writeDialog = true" color="#1976d2" class="white--text">WRITE</v-btn>
                </v-col>
              </v-row>
            </v-container>




          </v-card>
        </v-col>
    	</v-row>

      <div class="float-right button-container" >
        <div class="buttons">
            <v-row class="ma-2 mb-4">
              <button class="float-right ml-2 v-btn v-btn--depressed theme--light" style="background-color:#1976d2" icon>
                <v-icon color="white" x-large>question_answer</v-icon>
              </button>
            </v-row>
          </div>
      </div>

      <v-dialog v-model="writeDialog" max-width="1000" max-height="500">
        <v-card>
          <v-card-title class="headline">
            <div class="d-flex justify-content-center align-items-center mr-2" style="height:50px;width:50px;
            background-color:#1976d2;">
            <v-icon color="white" x-large>create</v-icon>
          </div>
            Write
          </v-card-title>
          <v-container fluid>
            <v-row>
              <v-col cols="12" sm="3">
                  <v-select v-model="teacher" label="Teacher" :items="teacher"></v-select>
              </v-col>
              <v-col cols="12" sm="9">
                  <v-text-field v-model="subject" label="Subject" :items="teacher"></v-text-field>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12">
                <v-textarea filled placeholder="Write here ..." v-model="writeText"></v-textarea>
              </v-col>
            </v-row>
            <v-row class="d-flex justify-content-end">
              <v-btn text style="color:#1976d2">Cancel</v-btn>
              <v-btn color="#1976d2" class="white--text mx-2">Submit</v-btn>
            </v-row>
          </v-container>
        </v-card>
      </v-dialog>

    </div>
  </v-container>
</template>

<script>
export default {
  data: () => ({
      selected: [2],
      writeDialog: false,
      items: [
        {
          action: '15 min',
          headline: 'Brunch this weekend?',
          title: 'Ali Connors',
          subtitle: "I'll be in your neighborhood doing errands this weekend. Do you want to hang out?",
        },
        {
          action: '2 hr',
          headline: 'Summer BBQ',
          title: 'me, Scrott, Jennifer',
          subtitle: "Wish I could come, but I'm out of town this weekend.",
        },
        {
          action: '6 hr',
          headline: 'Oui oui',
          title: 'Sandra Adams',
          subtitle: 'Do you have Paris recommendations? Have you ever been?',
        },
        {
          action: '12 hr',
          headline: 'Birthday gift',
          title: 'Trevor Hansen',
          subtitle: 'Have any ideas about what we should get Heidi for her birthday?',
        },
        {
          action: '18hr',
          headline: 'Recipe to try',
          title: 'Britta Holt',
          subtitle: 'We should eat this: Grate, Squash, Corn, and tomatillo Tacos.',
        },
      ],
    }),
}
</script>

<style lang="css">

.button-container {
  width: 50px;
  position: relative;
}

.buttons {
  margin: 0;
  position: absolute;
  top: 50%;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}

</style>
