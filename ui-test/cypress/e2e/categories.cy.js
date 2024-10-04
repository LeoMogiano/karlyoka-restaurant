import { faker } from "@faker-js/faker";
import { categories } from "../../data/categories";

export function categoriesActions() {
	cy.get(':nth-child(4) > .inline-flex').click();
	cy.wait(2000);
	create();
	cy.wait(1000);
	update();
	cy.wait(1000);
	// eliminar();
	search();
}

function create() {
	for (const category of categories()) {
		cy.get('.lg\\:w-3\\/5 > .justify-between > .flex > .inline-flex').click();
		
		if(category.name === "") {
			cy.get('.space-x-2 > .bg-white').click();
		}else{
			cy.get('.mt-4 > .flex > :nth-child(1) > .w-full').type(category.name);
			cy.get('.flex > :nth-child(2) > .w-full').type(category.description);
			cy.get('.space-x-2 > .bg-gray-800').click();
			cy.wait(1500);
		}
	}
}

function update() { // Error al actualizar con estos campos
	cy.get('.text-sm > :nth-child(1) > :nth-child(3) > div > :nth-child(1)').click();
	cy.get('.flex > :nth-child(2) > .w-full').clear();
	cy.get('.flex > :nth-child(2) > .w-full').type(faker.lorem.paragraph());
	cy.get('.space-x-2 > .bg-gray-800').click();
}

function eliminar() {
	cy.get('.text-sm > :nth-child(1) > :nth-child(3) > div > :nth-child(2)').click();
	cy.get('.flex-row > .justify-center').click();
}

function search() {
	cy.get('.justify-between > .w-full').type("salsas");
}