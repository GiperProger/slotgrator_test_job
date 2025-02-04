SELECT
    CASE
        WHEN g.grade < 8 THEN 'low'
        ELSE s.name
        END AS name,
    g.grade,
    s.marks
FROM students s
         JOIN grade g
              ON s.marks BETWEEN g.min_mark AND g.max_mark
ORDER BY
    g.grade DESC,
    CASE
        WHEN g.grade >= 8 THEN s.name
        ELSE s.marks
        END ASC;