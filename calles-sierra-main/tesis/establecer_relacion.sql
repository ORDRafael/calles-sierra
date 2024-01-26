ALTER TABLE informes
ADD CONSTRAINT fk_informes_pacientes
FOREIGN KEY (id_paciente)
REFERENCES paciente(id);