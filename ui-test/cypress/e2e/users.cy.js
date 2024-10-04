import { faker } from "@faker-js/faker";
import { users } from "../../data/users";

export function usersActions() {
	cy.get('.justify-between > :nth-child(1) > :nth-child(3) > .inline-flex').click();
	cy.wait(2000);
	create();
	cy.wait(1000);
	update();
	cy.wait(1000);
	cancelarEliminacion();
	confirmarEliminacion();
	cy.wait(1000);
	buscarPorNombre()
}

function create() {
	for (const user of users()) {
		cy.get('.lg\\:w-3\\/5 > .justify-between > .flex > .inline-flex').click();
		cy.get('.mt-4 > .flex > :nth-child(1) > .w-full').type(user.name);
		cy.get('.flex > :nth-child(2) > .w-full').type(user.lastname);
		cy.get('select').select(user.role);
		cy.get('.flex > :nth-child(4) > .w-full').type(user.email);
		cy.get(':nth-child(5) > .w-full').type(user.password);
		cy.get('.space-x-2 > .bg-gray-800').click();
		cy.wait(1500);
	}
}

function update() {
	cy.get(':nth-child(1) > :nth-child(5) > div > :nth-child(1)').click();
	cy.get('.mt-4 > .flex > :nth-child(1) > .w-full').type(faker.person.firstName());
	cy.get('.flex > :nth-child(4) > .w-full').clear();
	cy.get('.flex > :nth-child(4) > .w-full').type(faker.internet.email());
	cy.get(':nth-child(5) > .w-full').type("12345678")
	cy.get('.space-x-2 > .bg-gray-800').click();
}

function cancelarEliminacion() {
	cy.get(':nth-child(1) > :nth-child(5) > div > :nth-child(2)').click();
	cy.get('.flex-row > .bg-white').click();
}

function confirmarEliminacion() {
	cy.get(':nth-child(1) > :nth-child(5) > div > :nth-child(2)').click();
	cy.get('.flex-row > .justify-center').click();
}

function buscarPorNombre() {
	cy.get('.justify-between > .w-full').type("tomas");
}