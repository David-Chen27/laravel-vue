<template>
    <Modal :show="show" :max-width="maxWidth" :closeable="closeable" @close="close">
        <div class="md:flex">
          <button class="text-gray-300 hover:text-white focus:outline-none focus:ring-2 focus:ring-white absolute right-3 top-3" @click="close">
            <span class="sr-only">Close panel</span>
            <!-- Heroicon name: outline/x -->
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
          <div class="md:flex-auto">
            <img class="h-full w-full object-cover md:w-full" :src="'https://picsum.photos/768/1024?random=' + show.id">
          </div>
          <div class="md:flex-auto p-8 md:w-full md:max-w-screen-lg">
            <p class="block mt-1 text-lg leading-tight font-medium text-black">{{show.title}}</p>
            <p class="mt-2 text-gray-500">{{show.content}}</p>
          </div>
        </div>
    </Modal>
</template>

<script>

import Modal from "../../Jetstream/Modal";

export default {
  name: "CommunityModal",

  emits: ['close'],

  components: {
      Modal,
  },

  props: {
    show: {
      default: false
    },
    maxWidth: {
      default: '6xl'
    },
    closeable: {
      default: true
    },
  },

  methods: {
    close() {
      this.$emit('close')
    },
  }
}
</script>

<style scoped>

</style>