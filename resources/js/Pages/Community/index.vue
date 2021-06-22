<template>
    <app-layout>
      <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Community
        </h2>
      </template>
      <div class="py-12">
        <div class="flex flex-wrap-reverse gap-4 justify-center">
          <div v-for="item in communities" class="max-w-md bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
            <div class="md:flex">
              <div class="md:flex-shrink-0">
                <img class="h-full w-full object-cover md:w-48" :src="item.image + '?random=' + item.id">
              </div>
              <div class="p-8">
                <a href="#" @click="showCommunityModal(item.id)" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">{{item.title}}</a>
                <p class="mt-2 text-gray-500 md:h-24 overflow-hidden">{{item.description}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- Delete Token Confirmation Modal -->
      <community-modal :show="showCommunityBeingModal" :modify_count="modify_count" @close="showCommunityBeingModal = null" />
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
      "communities"
  ],
  data() {
    return {
      showCommunityBeingModal: null,
      modify_count: false,
    }
  },
  methods:{
      showCommunityModal(id) {
        axios.get(route('community.show', id))
          .then((res) => {
            this.modify_count = false;
            this.showCommunityBeingModal = res.data

            axios.post('/community', {"type" : "count", "id" : id})
              .then(() => {
                this.modify_count = true;
                this.showCommunityBeingModal.count += 1
              })
          })
      }
  }
}

</script>

<style scoped>

</style>