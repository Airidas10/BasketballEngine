<template>
    <div class="container">
        <h1>{{ team.name }} vs {{ opponent.name }}</h1>
        <div v-for="tacticType in tacticTypes">
            <p> 
                {{ tacticType.name }}: 
                <select class="form-control" v-model="tactics[tacticType.name]">
                    <option v-for="tactic in tacticType.tactics" :value="tactic.name">{{ tactic.name }}</option>
                </select>
            </p>
        </div>

        <button class="form-control btn btn-primary" @click.prevent="startGame">Start game</button>
    </div>
</template>

<script>
    export default {
        props: ['tacticTypes', 'team', 'opponent'],

        mounted() {
            this.tactics = this.defaultTactics
        },

        data () {
            return {
                // TODO: Fix magic numbers
                defaultTactics: {
                    Offense: 'Isolation attack',
                    Pace: 'Medium',
                    Defense: 'Man to Man',
                },

                tactics: {
                    Offense: null,
                    Pace: null,
                    Defense: null,
                },
            }
        },

        methods: {
            startGame(){
                let self = this
                let formData = this.getFormData()

                axios.post('/start_game', formData)
                .then(function (response) {
                    console.log(response.data.message)
                })
                .catch(function (error) {
                    console.log(error.response);
                    switch(error.response.status){
                        case 419:
                            alert("Session expired. Please login.")
                            break
                        case 422:
                            let errors = error.response.data.errors
                            for(let field in errors){
                                let fieldErrors = errors[field]
                                for(let i = 0; i < fieldErrors.length; i++){
                                    let fieldError = fieldErrors[i]
                                    self.errors.push({[field]: fieldError})
                                }
                            }
                            break
                        default:
                            alert("Something went wrong")
                            break
                    }
                });
            },

            getFormData(){
                let formData = {tactics: this.tactics, team: this.team, opponent: this.opponent}

                return formData
            },
        },
    }
</script>
