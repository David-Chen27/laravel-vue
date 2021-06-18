<template>
  <div class="mx-auto w-full flex flex-row py-2" :class="{'bg-gradient-to-r from-gray-50': div_hover}" @mouseleave="div_hover = false" @mouseover="div_hover = true">
    <div class="flex-grow">
      <input type="checkbox" class="ml-3.5 mr-2 mb-2 shadow-2xl rounded-full w-6 h-6 focus:ring-0 border-gray-100" :class="{'border-blue-400': div_hover}" :checked="todo.is_done" @change="updateTodo($event)"><span class="text-2xl" :class="{'line-through': todo.is_done}"> {{todo.description}} </span>
    </div>
    <div class="flex-grow-0 mx-4">
      <button class="h-8 w-12 rounded-xl text-white text-2xl bg-red-400 hover:bg-red-200 shadow-lg opacity-0 fill-trash" :class="{'fade_in': div_hover}" @click="deleteTodo">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: "DeleteTodoForm",
  props: ['todo'],
  data() {
    return {
      div_hover: false,
      deleteTodoForm: this.$inertia.form(),
      updateTodoForm: this.$inertia.form({
        is_done: null
      }),
    }
  },
  methods: {
    deleteTodo() {
      this.deleteTodoForm.delete(route('todolist.destroy', this.todo.id), {
        preserveScroll: true
      })
    },
    updateTodo(event) {
      this.updateTodoForm.is_done = event.target.checked
      this.updateTodoForm.put(route('todolist.update', this.todo.id),  {
        preserveScroll: true
      })
    }
  }
}
</script>

<style scoped>
.fade_in {
  animation: fade_in 0.6s cubic-bezier(0.65, 0.05, 0.36, 1) both;
}

@keyframes fade_in {
  10%{
    opacity: 0;
  }

  100% {
    opacity: 1;
  }
}
</style>