<template>
    <div>
      <h2>Add Subjects</h2>
      <div v-for="(subject, index) in subjects" :key="index" class="subject-item">
        <label for="subjectName">Subject Name:</label>
        <input v-model="subject.name" type="text" id="subjectName" required />
  
        <label for="subjectDescription">Subject Description:</label>
        <textarea v-model="subject.description" id="subjectDescription" required></textarea>
  
        <button @click="removeSubject(index)">Remove</button>
      </div>
  
      <button @click="addSubject">Add Subject</button>
      <button @click="saveSubjects">Save Subjects</button>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        subjects: [{ name: '', description: '' }],
      };
    },
    methods: {
      addSubject() {
        this.subjects.push({ name: '', description: '' });
      },
      removeSubject(index) {
        this.subjects.splice(index, 1);
      },
      saveSubjects() {
        axios.post('/subjects', { subjects: this.subjects })
          .then(response => {
            console.log('Subjects saved successfully:', response.data);
           
            // You may want to handle the response or reset the form here
          })
          .catch(error => {
            console.error('Error saving subjects:', error);
            // Handle errors as needed
          });
      },


    },
  };
  </script>
  
  <style>
  .subject-item {
    margin-bottom: 20px;
  }
  
  button {
    margin-top: 10px;
  }
  </style>
  