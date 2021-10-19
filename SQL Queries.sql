SELECT `id`, `firstname`, `lastname`
FROM `users`
WHERE `lastname` LIKE "%a%";


SELECT `id`, `firstname`, `lastname`
FROM `users`
WHERE `id` > 3;

SELECT COUNT(*)
FROM `assignments`;

SELECT COUNT(*)
FROM `assignments`
WHERE `deadline` LIKE "2022%";


SELECT
	`u`.`id` AS `user_id`,
	`u`.`firstname`,
	`u`.`lastname`,
	`u`.`email`,
	`a`.`id` AS `assignment_id`,
	`a`.`name`,
	`a`.`deadline`,
	`s`.`id` AS `submission_id`,
	`s`.`datetime`,
	`s`.`grade`
FROM `submissions` AS `s`

JOIN `users` AS `u`
ON `s`.`user_id` = `u`.`id`

JOIN `assignments` AS `a`
ON `s`.`assignment_id` = `a`.`id`;







UPDATE `users`
SET `lastname` = 'Springer'
WHERE `firstname` = 'Jerry';





INSERT INTO `submissions` (`user_id`, `assignment_id`, `datetime`, `grade`)
VALUES (4, 2, "2022-01-17 12:30:45", 75);





DELETE FROM `assignments`
WHERE `id` = 1


