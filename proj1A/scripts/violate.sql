-- (1) --
UPDATE Sales SET mid = 6666;
-- Violate the foreign key constraint
-- No Movie has an ID == 6666
-- TODO: An output/error here...
