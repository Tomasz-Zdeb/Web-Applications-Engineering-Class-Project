CREATE TABLE IF NOT EXISTS msgs (
    id SERIAL PRIMARY KEY,
    mymsg VARCHAR(50)
);

INSERT INTO msgs (mymsg)
VALUES
    ('Hello'),
    ('CPU');