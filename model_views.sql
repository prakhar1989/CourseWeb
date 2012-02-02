CREATE VIEW `round2_display_view` 

AS
select `courses`.`credits` AS `credits`,
`courses`.`course_id` AS `course_id`,
`courses`.`course_name` AS `course_name`,`courses`.`faculty` AS `faculty`,`courses`.`seats` AS `seats`,`courses`.`round1` AS `applied`,`round2_slots`.`slot` AS `slot` from (`courses` join `round2_slots` on((`courses`.`course_id` = `round2_slots`.`course_id`)));
