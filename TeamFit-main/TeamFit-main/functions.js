// Function to toggle the navigation menu visibility
function toggleMenu() {
    const navMenu = document.getElementById('navMenu');
    navMenu.classList.toggle('show');
}

// Example data for demonstration purposes
    const mockData = {
      "TEAM123": {
        name: "Wildcats",
        sport: "Basketball",
        coach: "Coach John Doe",
        members: [
          "Alice Johnson",
          "Bob Smith",
          "Charlie Brown",
          "Dana White"
        ]
      },
      "TEAM456": {
        name: "Sharks",
        sport: "Swimming",
        coach: "Coach Jane Roe",
        members: [
          "Emily Davis",
          "Frank Wilson",
          "Grace Lee",
          "Henry King"
        ]
      }
    };

    document.getElementById("joinTeamForm").addEventListener("submit", function (e) {
      e.preventDefault();

      const teamCode = document.getElementById("teamCode").value.trim().toUpperCase();

      if (mockData[teamCode]) {
        // Populate team information
        const team = mockData[teamCode];
        document.getElementById("teamName").textContent = team.name;
        document.getElementById("teamSport").textContent = team.sport;
        document.getElementById("teamCoach").textContent = team.coach;

        // Populate members list
        const membersList = document.getElementById("teamMembers");
        membersList.innerHTML = ""; // Clear existing members
        team.members.forEach(member => {
          const li = document.createElement("li");
          li.textContent = member;
          membersList.appendChild(li);
        });

        // Show sections
        document.getElementById("teamInfo").style.display = "block";
        document.getElementById("membersList").style.display = "block";
      } else {
        alert("Invalid team code. Please try again.");
        document.getElementById("teamInfo").style.display = "none";
        document.getElementById("membersList").style.display = "none";
      }
    });
