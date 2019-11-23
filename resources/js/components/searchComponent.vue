<template>
    <div class="mt-4 mb-5">
        <input type="text" v-model="keyword" placeholder="Search Jobs......" v-on:keyup="Searchjob()"
               class="form-control">
        <div class="card-footer" v-if="results.length">
            <ul class="list-group">
                <li class="list-group-item" v-for="result in results">
                    <a :href="result.id +'/'+ result.slug +'/'">
                        {{result.title}} <br>
                        <small class="badge badge-secondary">{{result.position}}</small>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                keyword: '',
                results: [],
            }
        },
        methods: {
            Searchjob() {
                this.results = [];
                if (this.keyword.length >= 1) {
                    axios.get('search/', {params: {keyword: this.keyword}}).then(
                        response => {
                            this.results = response.data;
                        });
                }
            }
        }
    }
</script>
