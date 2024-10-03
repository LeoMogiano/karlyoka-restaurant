import { faker } from '@faker-js/faker';

export const categories = () => {
	const arrayCategories = [];
	for(let i = 0; i < 3; i++) {
		arrayCategories.push({
			"name": faker.food.ethnicCategory(),
			"description": faker.lorem.paragraph(),
		})
	}
	return arrayCategories;
}