function searchStudent() {
    const studentId = document.getElementById('searchId').value;
    if (studentId) {
      fetch('php/get_student.php?id=' + studentId)
        .then(response => response.json())
        .then(data => {
          // console.log("Fetched Data:", data);
          if (data.found) {
            document.getElementById('updateStudentId').value = data.id;
            document.getElementById('updateName').value = data.name;
            document.getElementById('updateEmail').value = data.email;
            document.getElementById('updateAge').value = data.age;
            const row = document.getElementById('currentInfoRow');
            row.innerHTML = `
              <td>${data.id}</td>
              <td>${data.name}</td>
              <td>${data.email}</td>
              <td>${data.age}</td>
            `;
            document.getElementById('updateSection').classList.remove('hidden');
          } else {
            alert("Student not found.");
          }
        })
        .catch(error => {
          console.error("Error fetching student data:", error);
        });
    } else {
      alert("Please enter a valid Student ID.");
    }
  }
  
  function showDeleteSection() {
    const studentId = document.getElementById('deleteSearchId').value;
    if (studentId) {
      fetch('php/get_student.php?id=' + studentId)
        .then(response => response.json())
        .then(data => {
          if (data.found) {
            document.getElementById('deleteStudentId').value = data.id;
            const row = document.getElementById('deleteInfoRow');
            row.innerHTML = `
              <td>${data.id}</td>
              <td>${data.name}</td>
              <td>${data.email}</td>
              <td>${data.age}</td>
            `;
            document.getElementById('deleteSection').classList.remove('hidden');
          } else {
            alert("Student not found.");
          }
        })
        .catch(error => {
          console.error("Error fetching student data:", error);
        });
    } else {
      alert("Please enter a valid Student ID.");
    }
  }
  

// function searchStudent(mode) {
//   const studentId = document.getElementById(mode + 'SearchId').value;
//   if (studentId) {
//     fetch('php/get_student.php?id=' + studentId)
//       .then(response => response.json())
//       .then(data => {
//         console.log("Fetched Data:", data);
//         if (data.found) {
//           document.getElementById(mode + 'StudentId').value = data.id;
          
//           // Only update the form if mode is "update"
//           if (mode === "update") {
//             document.getElementById('updateName').value = data.name;
//             document.getElementById('updateEmail').value = data.email;
//             document.getElementById('updateAge').value = data.age;
//           }

//           // Update the "Current Student Information" table
//           const row = document.getElementById(mode + 'InfoRow');
//           row.innerHTML = `
//             <td>${data.id}</td>
//             <td>${data.name}</td>
//             <td>${data.email}</td>
//             <td>${data.age}</td>
//           `;

//           // Show the correct section
//           document.getElementById(mode + 'Section').classList.remove('hidden');
//         } else {
//           alert("Student not found.");
//         }
//       })
//       .catch(error => {
//         console.error("Error fetching student data:", error);
//       });
//   } else {
//     alert("Please enter a valid Student ID.");
//   }
// }
