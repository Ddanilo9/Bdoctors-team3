<template>

    <div class="searchbar">
            <form class="d-flex gap-1 form-inline my-2 my-lg-0 w-75" id="form">
                <input v-model="search" class="border form-control mr-sm-2 w-50" type="search"
                    placeholder="Scrivi qui.." aria-label="Search" @input="searchInput"
                    @click="displayComponent" @keyup="displayComponent">
                <router-link :to="{name: 'AdvancedSearch', params: {specialization: selectedSpec.spec_name.toString()} }"
                    id="search-button"
                    class="btn btn-info bg-opacity-25 my-2 my-sm-0 d-flex justify-content-center">
                    <!-- <img id="search-icon" src="../../../public/img/search.svg" alt="search"> -->
                    Cerca
                </router-link>
            </form>
            <div class="collapse position-absolute d-flex  my-collapse" v-if="display"
                @mouseleave="focusOut">
                <ul class="card overflow-auto my-overflow">
                    <li v-for="specialization in specializations" :key="specialization.id"
                        @click="selectSpecialization(specialization)">
                        {{ specialization.spec_name }}
                    </li>
                </ul>
            </div>
    </div>
    
    
</template>

<script>

export default {
    components: {
        
    },
    data() {
        return {
            search: "",
            // doctors: [],
            specializations: [],
            selectedSpec: {
                'spec_name': '',
                'id': ''
            },
            display: false,
        }
    },
    methods: {

    searchInput() {
        if (this.search != '') {
            axios.get('/api/search/specialization?specialization=' + this.search)
                .then(res => {
                    if (res.data.success) {
                        this.specializations = res.data.result;
                    }
                });
        } else {
            this.specializations = [];
        }
        console.log(this.specializations)
    },

    selectSpecialization(specialization) {
        this.selectedSpec = {
                'spec_name': specialization.spec_name,
                'id': specialization.id
            };
            this.search = specialization.spec_name;
    },
    displayComponent() {
            this.display = true;
    },
    focusOut() {
        this.display = false;
    },

    filterFunction() {
        var input, filter, ul, li, a, i;
        filter = this.search.toUpperCase();
        div = document.getElementById("myDropdown");
        li = div.getElementsByTagName("a");
        for (i = 0; i < a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
            a[i].style.display = "";
            } else {
            a[i].style.display = "none";
            }
        }
    }

  },
}

</script>

<style lang="scss" scoped>

#search-icon {
    max-width: 50px;
}

li {
    list-style-type: none;
}

.my-collapse {
    z-index: 99999;
    width: 15%;

    ul {
        padding: 0;
    }

    li {
        list-style-type: none;
        padding-left: 5px;
    }

    li:hover {
        background-color: blue;
    }

    .my-overflow {
        width: 100%;
    }
}

</style>