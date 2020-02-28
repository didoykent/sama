<template>
<v-container>
	<v-card flat>

		<v-row class="mt-3 ml-2">
			<v-col cols="12" sm="4" md="2" align="center" class="pb-0">
				<v-text-field class="pb-0" label="Search" placeholder="Search Academy" v-model="search" outlined></v-text-field>
			</v-col>
			<v-col cols="12" sm="4" md="5" align="center" class="pb-0">
				<v-row>
				<v-col cols="12" sm="4" md="2"  justify="center" class=" nav px-0">
					<v-btn block text @click="navClick($event)">Guidlines</v-btn>
				</v-col>
				<v-divider vertical></v-divider>
				<v-col cols="12" sm="4" md="2" align="center" justify="center" class="nav px-0">
					<v-btn block text @click="navClick($event)">Students</v-btn>
				</v-col>
				<v-divider vertical></v-divider>
				<v-col cols="12" sm="4" md="2" align="center" justify="center" class="nav px-0">
					<v-btn block text @click="navClick($event)">Price List</v-btn>
				</v-col>
				<v-divider vertical></v-divider>
				</v-row>
			</v-col>
		</v-row>

		<v-row class="ml-2">
			<v-col cols="12" sm="4" md="2" align="center" class="pt-0">
				<v-card class="overflow-y-auto" max-height="500px">
					<v-list>
						<template>
							<v-list-item-group color="primary">
								<v-list-item v-for="(academy, index) in filteredList" :key="academy">
									<v-list-item-content>
										<v-list-item-title @click="selectAcademy({academy})">{{academy}}</v-list-item-title>
									</v-list-item-content>
								</v-list-item>
							</v-list-item-group>
						</template>
					</v-list>
				</v-card>
			</v-col>
			<v-col cols="12" md="10" class="pt-0" max-height="100">
				<v-card v-if="currentComponent === 'PriceTable'" max-height="500" class="overflow-y-auto pa-2">
					<PriceTable></PriceTable>
				</v-card>
			</v-col>
		</v-row>
		</v-col>
		</v-row>


	</v-card>
</v-container>
</v-row>

</v-container>
</template>

<script>
import Vue from 'vue'
import PriceTable from './PriceTable'

export default {

	components: {
		PriceTable
	},

	data() {
		return {

			currentComponent: '',
			search: '',
			academyList: ['Alton Study', 'Anytalk', 'Bigcat', 'Daily Speaking', 'ECK Edu', 'Edunuri', 'Engforu', 'EnglishTOK', 'EverydayCN', 'Flocampus',
				'Future', 'G Talking', 'GG Youth', 'Grace Talk', 'Himsolutek', 'Injae', 'JKOLS', 'JoongAng', 'JoongAng China', 'JTalk',
				'Kakyo Edu', 'Kingdom Edu', 'Kisan', 'LangTalk', 'LG Academy', 'Making Speaker',
				'Mangolang', 'Megatalking', 'MGEnglish', 'Mirae', 'MK Edu', 'Mot English',
				'Narae', 'Phonetalk', 'SayOn', 'SGS', 'SKN(Kwak)', 'Speaking Mate', 'Talking Run',
				'TeacherWel', 'Topsphone', 'Up Talking Club', 'Wants', 'Watjjang'
			],
			src: '',

		}
	},

	computed: {
		filteredList() {
			if (this.search) {
				return this.academyList.filter((academy) => academy.toLowerCase().indexOf(this.search.toLowerCase()) > -1);
			} else {
				return this.academyList;
			}
		}
	},

	methods: {

		navClick(selected) {
			console.log(selected.target.innerText)
			if (selected.target.innerText == 'PRICE LIST') {
				this.currentComponent = 'PriceTable'
			}
		}

	}

}
</script>

<style scoped lang="css">

  .v-messages .theme--light .messages__wrapper{
    height: 0px;
  }

	.link{
		text-decoration: none;
	}

	.router-link{
  background:blue;
}

.nav{
	max-width: 200px;
}
</style>
