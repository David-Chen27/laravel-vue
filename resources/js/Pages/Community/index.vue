<template>
    <app-layout>
      <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Community
        </h2>
      </template>
      <div class="py-12">
        <div class="flex flex-wrap-reverse mx-auto gap-4 justify-center">
          <div v-for="item in communities" class="max-w-md bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl center">
            <div class="md:flex">
              <div class="md:flex-shrink-0">
                <img class="h-48 w-full object-cover md:w-48" :src="item.image + '?random=' + item.id">
              </div>
              <div class="p-8">
                <a href="#" @click="confirmApiTokenDeletion(item)" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">{{item.title}}</a>
                <p class="mt-2 text-gray-500">{{item.description}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- Delete Token Confirmation Modal -->
      <community-modal :communities="communities" :show="apiTokenBeingDeleted" @close="apiTokenBeingDeleted = null" />
    </app-layout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout";
import CommunityModal from "./CommunityModal";

export default {
  name: "Todolist",
  components: {
    AppLayout,
    CommunityModal,
  },
  props: [
    'communities'
  ],
  data() {
    return {
      apiTokenBeingDeleted: null,
    }
  },
  methods:{
      confirmApiTokenDeletion(token) {
        this.apiTokenBeingDeleted = token
      }
  }
}


</script>

<style scoped>

</style>