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
            <div class="flex flex-col">
              <div class="flex-col">
                <p class="block mt-1 text-lg leading-tight font-medium text-black">{{ show.title }}</p>
                <p class="mt-2 text-gray-500">{{ show.content }}</p>
              </div>
              <div class="flex-col h-10 my-5">
                <transition name="modify-count" @after-enter="modify_count = false" mode="out-in">
                  <span v-if="modify_count" class="float-right ml-1 oldstyle-nums font-mono font-bold text-gray-500">+1</span>
                  <span v-else class="float-right ml-1 oldstyle-nums font-mono font-bold text-gray-500">{{ show.count }}</span>
                </transition>

                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 strock-current text-gray-500 float-right" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
              </div>
            </div>
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
    modify_count: {
      default: false
    }
  },

  methods: {
    close() {
      this.$emit('close')
    },
  }
}
</script>

<style scoped>
  .modify-count-enter-active{
    animation: modify-count-in 1.5s cubic-bezier(.68,-0.55,.27,1.55);
  }

  @keyframes modify-count-in {
      100% {
          opacity: 1;
      }

      0% {
          opacity: 0;
      }
  }
</style>