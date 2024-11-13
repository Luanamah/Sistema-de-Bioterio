// Dados de exemplo para os animais
const animals = [
  { id: 1, name: "Rex", type: "Cão", status: "available" },
  { id: 2, name: "Mia", type: "Gato", status: "allocated" },
  { id: 3, name: "Bolinha", type: "Cão", status: "available" },
];

function loadAnimals() {
  const animalTable = document.getElementById("animalTable");
  animalTable.innerHTML = "";
  animals.forEach(animal => {
    const row = document.createElement("tr");
    row.innerHTML = `
      <td>${animal.name}</td>
      <td>${animal.type}</td>
      <td>${animal.id}</td>
      <td>${animal.status === "available" ? "Disponível" : "Alocado"}</td>
      <td>
        ${animal.status === "available" ? `<button onclick="allocate(${animal.id})">Alocar</button>` 
                                         : `<button onclick="deallocate(${animal.id})">Desalocar</button>`}
      </td>
    `;
    animalTable.appendChild(row);
  });
}

function filterAnimals() {
  const search = document.getElementById("search").value.toLowerCase();
  const statusFilter = document.getElementById("statusFilter").value;
  const filteredAnimals = animals.filter(animal => {
    const matchesSearch = animal.name.toLowerCase().includes(search) || animal.type.toLowerCase().includes(search);
    const matchesStatus = statusFilter === "all" || animal.status === statusFilter;
    return matchesSearch && matchesStatus;
  });
  updateAnimalTable(filteredAnimals);
}

function updateAnimalTable(filteredAnimals) {
  const animalTable = document.getElementById("animalTable");
  animalTable.innerHTML = "";
  filteredAnimals.forEach(animal => {
    const row = document.createElement("tr");
    row.innerHTML = `
      <td>${animal.name}</td>
      <td>${animal.type}</td>
      <td>${animal.id}</td>
      <td>${animal.status === "available" ? "Disponível" : "Alocado"}</td>
      <td>
        ${animal.status === "available" ? `<button onclick="allocate(${animal.id})">Alocar</button>` 
                                         : `<button onclick="deallocate(${animal.id})">Desalocar</button>`}
      </td>
    `;
    animalTable.appendChild(row);
  });
}

function allocate(id) {
  const animal = animals.find(animal => animal.id === id);
  if (animal && animal.status === "available") {
    animal.status = "allocated";
    loadAnimals();
  }
}

function deallocate(id) {
  const animal = animals.find(animal => animal.id === id);
  if (animal && animal.status === "allocated") {
    animal.status = "available";
    loadAnimals();
  }
}

// Carregar lista inicial
loadAnimals();
