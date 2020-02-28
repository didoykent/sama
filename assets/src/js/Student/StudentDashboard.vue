<template style="overflow-x: hidden;">
<v-container fluid >



<div class="d-flex flex-row justify-space-between">
	<v-row justify="center">

		<v-col xs="12" sm="12" md="3" class="pr-0" >
			<v-date-picker v-model="date2" :event-color="date => date[9] % 2 ? 'red' : 'yellow'" :events="functionEvents" :max-width="pickerWidth"></v-date-picker>
		</v-col>

		<v-col xs="12" sm="12" md="6" class="pl-0">
			<v-card class="eventCard" height="100%" :style="styleClass">

				<v-card class="pa-0 ma-0 eventCard" color="#1976d2" height="24%" flat>
					<v-container>
						<v-row align="center" class="pl-4 mt-4" >
							<span class="white--text font-weight-medium display-1">My Classes</span>
						</v-row>
					</v-container>
				</v-card>

				<v-card flat>
				<v-container class="">
					<v-expansion-panels tile flat>
						<v-expansion-panel v-for="(item,i) in Tutors" :key="i">
							<v-expansion-panel-header>
								<div class="d-flex flex-row">
									<v-icon color="blue lighten-4" class="mr-2">fiber_manual_record</v-icon>
									<span class="mt-1" style = "text-transform:capitalize;">{{item['tutor']['mega_name']}}</span>
									<v-spacer></v-spacer>
									<span class="mt-1 mr-5">{{getSchedule(item['schedule'])}}</span>
								</div>
							</v-expansion-panel-header>
							<v-expansion-panel-content>
								<v-row>
									<v-icon class="mx-2" color="#1976d2" medium>videocam</v-icon>
									<v-icon class="mx-2" color="#1976d2" medium>book</v-icon>
									<v-icon class="mx-2" color="#1976d2" medium>description</v-icon>
									<v-icon class="mx-2" color="#1976d2" medium>headset</v-icon>
									<v-icon class="mx-2" color="#1976d2" medium>insert_chart</v-icon>
									<v-spacer></v-spacer>
									<v-icon class="mx-2" color="#1976d2" medium>edit</v-icon>
									<v-icon class="mx-2" color="#1976d2" medium>chat</v-icon>
									<v-icon class="mx-2" color="#1976d2" medium>loop</v-icon>
									<v-icon class="mx-2" color="#1976d2" medium>event_busy</v-icon>
								</v-row>
							</v-expansion-panel-content>
						</v-expansion-panel>
					</v-expansion-panels>
				</v-container>
				</v-card>

			</v-card>
		</v-col>
	</v-row>


  <div class="float-right button-container" >
    <div class="buttons">
        <v-row class="ma-2 mb-4">
          <button class="float-right ml-2 v-btn v-btn--depressed theme--light" style="background-color:#1976d2" icon>
            <v-icon color="white" x-large>add</v-icon>
          </button>
        </v-row>
        <v-row class="ma-2 mb-4">
          <button class="float-right ml-2 v-btn v-btn--depressed theme--light" style="background-color:#1976d2" icon>
            <v-icon color="white" x-large>question_answer</v-icon>
          </button>
        </v-row>
      </div>
  </div>

  </div>




</v-container>
</template>

<script>

import moment from 'moment'

import axios from 'axios'
export default {

	data: () => ({
		Tutors: [],
		arrayEvents: null,
		date2: new Date().toISOString().substr(0, 10),
		styleClass: '',
		pickerWidth:'',
	}),



	mounted() {


		this.arrayEvents = [...Array(6)].map(() => {
			const day = Math.floor(Math.random() * 30)
			const d = new Date()
			d.setDate(day)
			return d.toISOString().substr(0, 10)
		})

		console.log(this.$vuetify.breakpoint.name)

		if(this.$vuetify.breakpoint.name == "xs"){
			this.styleClass = "margin-left:12px;"
			this.pickerWidth = "360"
		}

		this.getClasses()



	},

	methods: {
		functionEvents(date) {
			const [, , day] = date.split('-')
			if ([12, 17, 28].includes(parseInt(day, 10))) return true
			if ([1, 19, 22].includes(parseInt(day, 10))) return ['red', '#00f']
			return false
		},

		async getClasses(){

			await axios.get('Student/getClasses').then(res => {

				if(res.data.tutors){

					this.$set(this.$data, 'Tutors', res.data.tutors)
				}
				console.log(this.Tutors, 'classes')
			})
		},

		getSchedule(schedule){

			let start = moment({hour: schedule['hour'], minute: schedule['minute']}).format('HH:mm:ss')

			let end = moment(start,'HH:mm:ss').add(parseInt(schedule['duration']), 'minutes').format('HH:mm:ss')

			return start + " - " + end
		}
	},




}
</script>

<style scoped lang="css">

  .eventCard{
    border-radius: 0px;
  }

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
